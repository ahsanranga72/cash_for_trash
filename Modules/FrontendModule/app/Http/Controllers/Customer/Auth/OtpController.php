<?php

namespace Modules\FrontendModule\app\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OtpController extends Controller
{
    private $otp;
    private $user;

    public function __construct(Otp $otp, User $user)
    {
        $this->otp = $otp;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function otp()
    {
        return view('frontendmodule::customer.otp');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verify_otp(Request $request)
    {
        $request->validate([
            'otp' => 'required|integer|min:6'
        ]);

        $user = session('user');

        $otp = $this->otp->where('email', $user['email'])->first();

        if ($request['otp'] === $otp->otp) {
            $users = $this->user;
            $users->first_name = $user['first_name'];
            $users->last_name = $user['first_name'];
            $users->email = $user['email'];
            $users->phone = $user['phone'] ?? '';
            $users->password = bcrypt($user['password']);
            $users->user_type = CUSTOMER;
            if ($request->has('profile_image')) {
                $users->profile_image = image_uploader('users/profile_images/', 'png', $request['profile_image'], !empty($user['profile_image']) ? $user['profile_image'] : null);
            }
            $users->is_active = 1;
            $users->is_verified = 1;
            $users->save();

            $otp->delete();

            if (auth()->attempt(['email' => $users['email'], 'password' => $user['password'], 'is_active' => 1, 'user_type' => CUSTOMER])) {
                return redirect()->route('home')->with('success', 'Otp verified and user successfully registerted.');
                session()->forget('user');
            }

            return redirect()->back()
                ->withErrors(['Something Wrong !']);
        } else {
            return back()->withErrors('Otp does not match');
        }
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
