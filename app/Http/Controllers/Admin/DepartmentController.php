<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Department List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDepartmentActiveCLass'] = 'active';
        $data['departments'] = Department::paginate();
        return view('admin.setting.department.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Department';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDepartmentActiveCLass'] = 'active';
        return view('admin.setting.department.add')->with($data);
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
            'name' => 'required',
        ]);

        $item = new Department();
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.department.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Department';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDepartmentActiveCLass'] = 'active';
        $data['department'] = Department::find($id);
        return view('admin.setting.department.edit')->with($data);
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
            'name' => 'required',
        ]);

        $item = Department::find($id);
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.department.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Department::find($id);
        $item->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
