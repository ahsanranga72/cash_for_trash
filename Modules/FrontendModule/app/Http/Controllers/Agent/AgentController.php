<?php

namespace Modules\FrontendModule\app\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AgentModule\app\Models\Agent;
use Modules\AgentModule\app\Models\Location;

class AgentController extends Controller
{
    private $location;
    private $agent;
    private $user;

    public function __construct(Location $location, Agent $agent, User $user)
    {
        $this->location = $location;
        $this->agent = $agent;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function request_form()
    {
        $locations = $this->location->active()->get();
        return view('frontendmodule::agent.request-form', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function request_form_submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'location_id' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $agent_exist_in_location = $this->agent->where('location_id', $request['location_id'])->first();
        if($agent_exist_in_location){
            return back()->with('error', AGENT_EXIST_400['message']);
        }

        $user = $this->user;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->user_type = AGENT;
        if ($request->has('profile_image')) {
            $user->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], !empty($user['profile_image']) ? $user['profile_image'] : null);
        }
        $user->is_active = 0;
        $user->is_verified = 0;
        $user->save();

        $agent = $this->agent;
        $agent->user_id = $user->id;
        $agent->location_id = $request['location_id'];
        $agent->save();

        return redirect()->route('home')->with('success', AGENT_REQUEST_SUBMITTED_200['message']);
     }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('frontendmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('frontendmodule::edit');
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
