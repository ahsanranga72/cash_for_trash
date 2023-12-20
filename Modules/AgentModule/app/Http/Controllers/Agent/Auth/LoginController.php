<?php

namespace Modules\AgentModule\app\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        return view('agentmodule::auth.login');
    }

    public function submit(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'user_type' => AGENT], $request->remember)) {
            return redirect()->route('agent.dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect()->route('home')->with('success', AUTH_LOGOUT_200['message']);
    }
}
