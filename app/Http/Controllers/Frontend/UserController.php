<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myProfile()
    {
        $data['pageTitle'] = 'My Profile';
        return view('frontend.user.profile')->with($data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successful');
    }
}
