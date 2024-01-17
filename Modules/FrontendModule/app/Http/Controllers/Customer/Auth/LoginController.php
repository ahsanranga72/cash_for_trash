<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    private $user;
    private $otp;

    public function __construct(User $user, Otp $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }
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
    public function forget_password()
    {
        return view('frontendmodule::customer.auth.forgot-password');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function forgot_email_submit(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = $this->user->where('email', $request['email'])->first();

        if ($user) {
            session()->forget('user_email');
            session()->put('user_email', $request['email']);

            $rand = rand(100000, 999999);

            $otp = $this->otp;
            $otp->email = $request['email'];
            $otp->otp = $rand;
            $otp->save();

            Mail::to($request['email'])->send(new OtpMail($rand, $user));

            return redirect()->route('customer.auth.forgot-otp')->with('success', 'Check your email for otp');
        } else {
            return back()->withErrors('User not found !');
        }
    }

    public function forgot_otp()
    {
        return view('frontendmodule::customer.auth.forgot-otp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function forgot_otp_verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|integer|min:6'
        ]);

        $user_email = session('user_email');

        $otp = $this->otp->where('email', $user_email)->first();

        if ($request['otp'] === $otp->otp) {
            $otp->delete();
            return redirect()->route('customer.auth.password-reset')->with('success', 'Opt matched.');
        } else {
            return back()->withErrors('Otp does not match');
        }
    }

    public function password_reset()
    {
        return view('frontendmodule::customer.auth.password-reset');
    }

    public function password_reset_submit(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'same:password',
        ]);

        $user_email = session('user_email');

        $user = $this->user->where('email', $user_email)->first();
        $user['password'] = bcrypt($request['password']);
        $user->save();

        session()->forget('user_email');

        return redirect()->route('home')->with('success', 'Password successfully reseted.');
    }
}
