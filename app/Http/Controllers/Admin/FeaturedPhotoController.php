<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedGalleryPhoto;
use Illuminate\Http\Request;

class FeaturedPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = "Photo List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryPhotoActiveCLass'] = 'active';
        $data['photos'] = FeaturedGalleryPhoto::paginate();
        return view('admin.setting.featured_photo.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Featured Photo';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryPhotoActiveCLass'] = 'active';
        return view('admin.setting.featured_photo.add')->with($data);
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
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg|file|dimensions:min_width=800,min_height=500,max_width=800,max_height=500'
        ]);

        $photo = new FeaturedGalleryPhoto();
        $photo->title = $request->title;
        $photo->image = saveImage('FeaturedGalleryPhoto', $request->image);
        $photo->status = $request->status ?? 1;
        $photo->serial = $request->serial;
        $photo->save();

        return  redirect()->route('admin.setting.featured-photo.index')->with('success', 'Created Successfully');
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
        $data['pageTitle'] = 'Edit Featured Photo';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryPhotoActiveCLass'] = 'active';
        $data['photo'] = FeaturedGalleryPhoto::find($id);
        return view('admin.setting.featured_photo.edit')->with($data);
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
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg|file|dimensions:min_width=800,min_height=500,max_width=800,max_height=500'
        ]);

        $photo = FeaturedGalleryPhoto::find($id);
        $photo->title = $request->title;
        if ($request->file('image')) {
            deleteFile($photo->image);
            $photo->image = saveImage('FeaturedGalleryPhoto', $request->image);
        }
        $photo->status = $request->status ?? 1;
        $photo->serial = $request->serial;
        $photo->save();

        return  redirect()->route('admin.setting.featured-photo.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = FeaturedGalleryPhoto::find($id);
        $photo->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
