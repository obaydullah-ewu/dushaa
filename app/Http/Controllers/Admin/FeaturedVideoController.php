<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedGalleryVideo;
use Illuminate\Http\Request;

class FeaturedVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = "Video List";
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryVideoActiveCLass'] = 'active';
        $data['videos'] = FeaturedGalleryVideo::paginate();
        return view('admin.setting.featured_video.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Add Featured Video';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryVideoActiveCLass'] = 'active';
        return view('admin.setting.featured_video.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new FeaturedGalleryVideo();
        $video->title = $request->title;
        $video->video = $request->video;
        $video->status = $request->status ?? 1;
        $video->serial = $request->serial;
        $video->save();

        return  redirect()->route('admin.setting.featured-video.index')->with('success', 'Created Successfully');
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
        $data['pageTitle'] = 'Edit Featured Video';
        $data['navSettingActiveCLass'] = 'hover show';
        $data['subNavFeaturedGalleryVideoActiveCLass'] = 'active';
        $data['video'] = FeaturedGalleryVideo::find($id);
        return view('admin.setting.featured_video.edit')->with($data);
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
        $video = FeaturedGalleryVideo::find($id);
        $video->title = $request->title;
        $video->video = $request->video;
        $video->status = $request->status ?? 1;
        $video->serial = $request->serial;
        $video->save();

        return  redirect()->route('admin.setting.featured-video.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = FeaturedGalleryVideo::find($id);
        $video->delete();
        return  redirect()->back()->with('success', 'Deleted Successfully');
    }
}
