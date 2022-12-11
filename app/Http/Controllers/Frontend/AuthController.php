<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data['pageTitle'] = 'Login Form';
        return view('frontend.auth.login')->with($data);
    }

    public function login(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = request('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return redirect("login")->with('error',  'Email or password is incorrect');
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
        $user->token = Hash::make(rand(1000,9999));
        $user->save();
        $verify_route = route('register.verify',[$user->id, $user->token]);
        Mail::to($request->email)->send(new EmailVerificationMail($verify_route));
        return redirect()->route('login')->with('success', 'An email verification url send your given email. Please follow instructions');
    }

    public function registerVerify($user_id, $token)
    {
        $user = User::where(['id' => $user_id, 'token' => $token])->first();
        if ($user){
            $user->email_verified_at = now();
            $user->token = null;
            $user->save();
            return redirect()->route('login')->with('success', 'Successfully verified your account. Please Login Now');
        }
        return redirect()->route('login')->with('error', 'Sorry! Your link is not valid');
    }

}
