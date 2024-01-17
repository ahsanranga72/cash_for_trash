<?php

namespace Modules\AgentModule\app\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\AgentModule\app\Models\Location;
use Modules\FrontendModule\app\Models\Order;

class AgentController extends Controller
{
    private $order;
    private $user;

    public function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->order->where('agent_user_id', auth()->id())
            ->with('customer', 'agent')->latest()->paginate(10);
        return view('agentmodule::dashboard', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        $user = $this->user->with('agent')->find(auth()->id());
        return view('agentmodule::profile', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profile_update(Request $request)
    {
        $id = auth()->id();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
        ]);

        $user = $this->user->find($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        if ($request->has('profile_image')) {
            $user->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], $user['profile_image'] ?? NULL);
        }
        $user->is_active = 1;
        $user->is_verified = 1;
        $user->save();

        return back()->with('success', 'Successfully profile updated');
    }

    /**
     * Show the specified resource.
     */
    public function password_update(Request $request)
    {
        $request->validate([
            'old_pass' => 'required|min:8',
            'new_pass' => 'required|min:8',
            'confirm_pass' => 'required|same:new_pass',
        ]);

        $user = $this->user->find(auth()->id());

        if (!Hash::check($request->old_pass, $user->password)) {
            return back()->withErrors('Old password not matched !');
        }

        $user['password'] = bcrypt($request['new_pass']);
        $user->save();

        return back()->with('success', 'Successfully password reset.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('agentmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
