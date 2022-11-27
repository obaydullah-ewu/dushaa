<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FeaturedGalleryPhoto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['pageTitle'] = 'Home';
        $data['featuredPhotos'] = FeaturedGalleryPhoto::where('status', 1)->get();
        return view('frontend.home')->with($data);
    }
}
