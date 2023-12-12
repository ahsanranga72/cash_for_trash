<?php

namespace Modules\AgentModule\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\AgentModule\app\Models\Agent;
use Modules\AgentModule\app\Models\Location;

class AgentController extends Controller
{
    private $user;
    private $agent;
    private $location;

    public function __construct(User $user, Agent $agent, Location $location)
    {
        $this->user = $user;
        $this->agent = $agent;
        $this->location = $location;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $agents = $this->user->Type(AGENT)->with('agent')->when($request->has('search'), function ($query) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $query->Where('first_name', 'like', "%{$value}%");
            }
        })->latest()->paginate(10);

        return view('agentmodule::admin.agent.list', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = $this->location->active()->get();
        return view('agentmodule::admin.agent.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => 'image',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'location_id' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = $this->user;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->user_type = AGENT;
        if ($request->has('profile_image')) {
            $user->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], null);
        }
        $user->is_active = 1;
        $user->is_verified = 1;
        $user->save();

        $agent = $this->agent;
        $agent->user_id = $user->id;
        $agent->location_id = $request['location_id'];
        $agent->save();

        return redirect()->route('admin.agent.index')->with('success', DEFAULT_200_STORE['message']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agent = $this->user->Type(AGENT)->with('agent')->findOrFail($id);
        $locations = $this->location->active()->get();
        return view('agentmodule::admin.agent.edit', compact('agent', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'profile_image' => 'image',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
            'location_id' => 'required',
        ]);

        $user = $this->user->findOrFail($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        if ($request->has('profile_image')) {
            $user->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], !empty($user['profile_image']) ? $user['profile_image'] : null);
        }
        $user->is_active = 1;
        $user->is_verified = 1;
        $user->save();

        $agent = $this->agent->where('user_id', $user['id'])->first();
        $agent->location_id = $request['location_id'];
        $agent->save();

        return redirect()->route('admin.agent.index')->with('success', DEFAULT_200_UPDATE['message']);
    }

    public function update_password(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = $this->user->findOrFail($id);
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('admin.agent.index')->with('success', DEFAULT_200_PASSWORD_RESET['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = $this->user->where(['id' => $id])->first();
        if (!empty($user->profile_image)) {
            file_remover('users/profile_images/', $user->profile_image);
        }
        $user->agent->delete();
        $user->delete();
        session()->flash('success', DEFAULT_200_DELETE['message']);
        return back();
    }

    public function status_update(string $id): JsonResponse
    {
        $this->user->where('id', $id)->update(['is_active' => !$this->user->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }

    public function verification_update(string $id): JsonResponse
    {
        $this->user->where('id', $id)->update(['is_verified' => !$this->user->find($id)->is_active]);
        return response()->json(response_structure(DEFAULT_200_UPDATE), 200);
    }
}
