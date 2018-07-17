<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Speakers;

class SpeakersPageController extends Controller
{
    /**
     * Show the index page of jobs
     */
    public function index()
    {
        $speakers = Speakers::where('published', 1)->where('hype', 0)->orderBy('order', 'ASC')->get();
        return view('speakers', compact('speakers'));
    }
}
