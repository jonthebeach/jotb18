<?php

namespace App\Http\Controllers;

use \App\Members;
use File;

class AboutPageController extends Controller
{
    /**
     * Show the about page
     */
    public function index()
    {
        $thumbnailsDir = '/images/venue/thumbnails';
        $originalDir = '/images/venue/original';
        $venueImages = json_decode(File::get(resource_path('assets/venue/venue.json')), true);
        $members = Members::where('published', 1)->get();
                
        return view('about', compact('venueImages', 'thumbnailsDir', 'originalDir', 'members'));
    }
}
