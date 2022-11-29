<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Profession List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavProfessionActiveCLass'] = 'active';
        $data['professions'] = Profession::paginate();
        return view('admin.setting.profession.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Profession';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavProfessionActiveCLass'] = 'active';
        return view('admin.setting.profession.add')->with($data);
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

        $item = new Profession();
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.profession.index')->with('success', 'Created Successfully');
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
        $data['pageTitle'] = 'Edit Profession';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavProfessionActiveCLass'] = 'active';
        $data['profession'] = Profession::find($id);
        return view('admin.setting.profession.edit')->with($data);
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

        $item = Profession::find($id);
        $item->name = $request->name;
        $item->save();

        return  redirect()->route('admin.setting.profession.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Profession::find($id);
        $item->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
