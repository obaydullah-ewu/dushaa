<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user->save();
        return redirect()->route('login')->with('success', 'Registration Successfully Done');
    }

}
