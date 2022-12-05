<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\MemberCategory;
use Illuminate\Http\Request;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Member Category List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavMemberCategoryActiveClass'] = 'active';
        $data['categories'] = MemberCategory::paginate();
        return view('admin.setting.member-category.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Member Category';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavMemberCategoryActiveClass'] = 'active';
        return view('admin.setting.member-category.add')->with($data);
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
            'member_fee' => 'required',
        ]);

        $item = new MemberCategory();
        $item->name = $request->name;
        $item->member_fee = $request->member_fee;
        $item->save();

        return  redirect()->route('admin.setting.member-category.index')->with('success', 'Created Successfully');
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
        $data['pageTitle'] = 'Edit Member Category';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavMemberCategoryActiveClass'] = 'active';
        $data['category'] = MemberCategory::find($id);
        return view('admin.setting.member-category.edit')->with($data);
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
            'member_fee' => 'required',
        ]);

        $item = MemberCategory::find($id);
        $item->name = $request->name;
        $item->member_fee = $request->member_fee;
        $item->save();

        return redirect()->route('admin.setting.member-category.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MemberCategory::find($id);
        $item->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
