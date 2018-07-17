<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventImagesPageController extends Controller
{
    /**
     * Return all the event images categories
     */
    public function index()
    {
        $eventImagesGroups = \App\EventImages::where('event_images.published', 1)->get();

        return view('eventImages', compact('eventImagesGroups'));
    }

    /**
     * Return the images of a specific event image group id
     */
    public function getImagesByEventImageGroupId(\App\EventImages $eventImages)
    {
        $eventImagesFiles = \App\EventImagesFiles::where('published', 1)
        ->where('event_images_id', $eventImages->id)
        ->get();

        return view('partials.eventImagesGroup', compact('eventImagesFiles'));
    }
}
