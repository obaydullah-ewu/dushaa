<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\FeaturedGalleryPhoto;
use App\Models\FeaturedGalleryVideo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['pageTitle'] = 'Home';
        $data['featuredPhotos'] = FeaturedGalleryPhoto::where('status', ACTIVE)->get();
        $data['featuredVideos'] = FeaturedGalleryVideo::where('status', ACTIVE)->get();
        $data['event'] = Event::whereDate('registration_deadline', '>=', now())->whereDate('date', '>=', now())->active()->first();
        return view('frontend.home')->with($data);
    }
}
