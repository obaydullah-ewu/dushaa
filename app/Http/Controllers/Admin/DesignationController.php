<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Designation List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDesignationActiveCLass'] = 'active';
        $data['designations'] = Designation::paginate();
        return view('admin.setting.designation.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Designation';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDesignationActiveCLass'] = 'active';
        return view('admin.setting.designation.add')->with($data);
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

        $item = new Designation();
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.designation.index')->with('success', 'Created Successfully');
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
        $data['pageTitle'] = 'Edit Designation';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavDesignationActiveCLass'] = 'active';
        $data['designation'] = Designation::find($id);
        return view('admin.setting.designation.edit')->with($data);
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

        $item = Designation::find($id);
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.designation.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Designation::find($id);
        $item->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
