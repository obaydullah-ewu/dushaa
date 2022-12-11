<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data['pageTitle'] = 'Login Form';
        return view('frontend.auth.login')->with($data);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = request('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return redirect("login")->with('error', 'Email or password is incorrect');
        }

        return redirect()->route('user.my-profile')->with('success', 'Login Successfully');

    }

    public function showRegisterForm()
    {
        $data['pageTitle'] = 'Registration Form';
        return view('frontend.auth.register')->with($data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = Hash::make(rand(1000, 9999));
        $user->save();
        $verify_route = route('register.verify', [$user->id, $user->token]);
        Mail::to($request->email)->send(new EmailVerificationMail($verify_route));
        return redirect()->route('login')->with('success', 'An email verification url send your given email. Please follow instructions');
    }

    public function registerVerify($user_id, $token)
    {
        $user = User::where(['id' => $user_id, 'token' => $token])->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->token = null;
            $user->save();
            return redirect()->route('login')->with('success', 'Successfully verified your account. Please Login Now');
        }
        return redirect()->route('login')->with('error', 'Sorry! Your link is not valid');
    }

    public function forgetPassword()
    {
        $data['pageTitle'] = 'Forget Password';
        return view('frontend.auth.forget-password')->with($data);
    }

    public function forgetPasswordEmailSent(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if ($user) {
            $token = rand(1000, 9999);
            $user->token = $token;
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($token));
            return redirect()->route('forget-password.otp', $user->id)->with('success', '4 digit security code sent your mail. Please check your mail');
        }
        return redirect()->back()->with('error', 'Sorry! Email is not valid. Try again');
    }

    public function forgetPasswordOTP($id)
    {
        $data['pageTitle'] = 'Forget Password';
        $data['user'] = User::find($id);
        return view('frontend.auth.forget-password-set')->with($data);
    }

    public function forgetPasswordOTPCheck(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'confirmation_password' => 'required|min:6',
        ]);
        $user = User::where(['email' => $request->email, 'token' => $request->token])->first();
        if ($user) {
            if ($request->password != $request->confirmation_password) {
                return redirect()->back()->with('error', 'Sorry! Your password and confirmation password is not same');
            }
            $user->password = Hash::make($request->password);
            $user->token = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('login')->with('success', 'Successfully verified your account. Please Login Now');
        }

        return redirect()->back()->with('error', 'Sorry! Your security code is not valid');
    }

}
