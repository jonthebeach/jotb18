<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosPageController extends Controller
{
    /**
     * Return all the event images categories
     */
    public function index()
    {
        $videoGroups = \App\VideoGroups::where('published', 1)->orderBy('order')->get();

        return view('videos', compact('videoGroups'));
    }

    /**
     * Return the images of a specific event image group id
     */
    public function getVideosByVideoGroupId(\App\VideoGroups $videoGroups)
    {
        $videos = $videoGroups->getVideosData();

        return view('partials.videosGroup', compact('videos'));
    }
}
