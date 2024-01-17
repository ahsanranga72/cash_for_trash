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

class RegistrationController extends Controller
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
    public function registration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = [
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        session()->forget('user');
        session()->put('user', $user);

        $rand = rand(100000, 999999);

        $otp = $this->otp;
        $otp['email'] = $request['email'];
        $otp['otp'] = $rand;
        $otp->save();

        

        Mail::to($request->email)->send(new OtpMail($rand, $user));
        
        return redirect()->route('customer.auth.otp')->with('success', 'Check your email for OTP.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontendmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
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
