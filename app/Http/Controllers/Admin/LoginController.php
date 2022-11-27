<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->guard('admin')->attempt($data)){
            return redirect()->route('admin.dashboard')->with('success','Login Successful');
        }


        return redirect()->route('admin.login')->with('error','Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth()->guard('admin')->logout();

        return redirect()->route('admin.login')->with('success','Logout Successful');
    }
}
