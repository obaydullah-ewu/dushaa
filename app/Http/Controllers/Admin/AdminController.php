<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use ResponseStatusTrait;
    public function index(Request $request)
    {
        $data['pageTitle'] = 'Admin List';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminIndexActiveCLass'] = 'active';
        $data['admins'] = Admin::where(function ($q) use ($request){
            if ($request->search_field) {
                $q->where($request->search_field,'LIKE','%'.$request->search_string.'%');
            }
        })->paginate();
        return view('admin.admin.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Admin';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAddAdminActiveCLass'] = 'active';
        return view('admin.admin.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6'
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile_number = $request->mobile_number;
        $admin->address = $request->address;
        $admin->designation = $request->designation;
        $admin->status = $request->status;

        $admin->password = Hash::make($request->password);

        if ($request->has('image')){
            deleteFile($admin->image);
            $image = saveImage('Admin', $request->image);
            $admin->image = $image;
        }

        $admin->save();

        return redirect()->route('admin.admin.index', $admin->id)->with('success', 'Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = 'Admin Details';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminListActiveCLass'] = 'active';
        $data['admin'] = Admin::findOrFail($id);

        return view('admin.admin.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Admin';
        $data['navAdminActiveCLass'] = 'hover show';
        $data['subNavAdminListActiveCLass'] = 'active';
        $data['admin'] = Admin::findOrFail($id);
        return view('admin.admin.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile_number = $request->mobile_number;
        $admin->address = $request->address;
        $admin->designation = $request->designation;
        $admin->status = $request->status;

        if ($request->password){
            $admin->password = Hash::make($request->password);
        }

        if ($request->has('image')){
            deleteFile($admin->image);
            $image = saveImage('Admin', $request->image);
            $admin->image = $image;
        }

        $admin->save();

        return redirect()->route('admin.admin.index', $admin->id)->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');;

    }

    public function changePassword($id)
    {
        $data['pageTitle'] = 'Change Password';
        $data['admin'] = Admin::find($id);
        return view('admin.admin.change-password')->with($data);
    }

    public function changePasswordUpdate(Request $request, $id)
    {
        $request->validate([
           'password' => 'required'
        ]);
        $data['pageTitle'] = 'Change Password';
        $admin = Admin::find($id);
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.admin.show', $admin->id)->with('success', 'Changed Successfully');;
    }
}
