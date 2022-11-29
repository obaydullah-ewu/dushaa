<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\MemberCategory;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function myProfile()
    {
        $data['pageTitle'] = 'My Profile';
        $data['departments'] = Department::all();
        $data['designations'] = Designation::all();
        $data['professions'] = Profession::all();
        $data['categories'] = MemberCategory::all();
        $data['user'] = User::find(Auth::id());
        return view('frontend.user.profile')->with($data);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nick_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'session_year' => 'required',
            'department_id' => 'required',
            'image' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->nick_name = $request->nick_name;
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;
        $user->session_year = $request->session_year;
        $user->department_id = $request->department_id;
        $user->profession_id = $request->profession_id;
        $user->designation_id = $request->designation_id;
        $user->office_address = $request->office_address;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;
        $user->member_category_id = $request->member_category_id;

        if ($request->has('image')){
            deleteFile($user->image);
            $image = saveImage('Admin', $request->image);
            $user->image = $image;
        }

        $user->save();

        return redirect()->back()->with('success', 'Updated Successfully');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successful');
    }
}
