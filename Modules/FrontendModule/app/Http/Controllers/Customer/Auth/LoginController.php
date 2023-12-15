<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login_form()
    {
        return view('frontendmodule::customer.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'user_type' => CUSTOMER], $request->remember)) {
            return redirect()->route('home')->with('success', AUTH_LOGIN_200['message']);
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect()->route('home')->with('success', AUTH_LOGOUT_200['message']);
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
