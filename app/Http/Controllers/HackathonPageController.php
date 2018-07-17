<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HackathonPageController extends Controller
{
    /**
     * Show the list of workshops
     */
    public function index()
    {
        $workshop = \App\Workshops::where('published', 1)->where('type', 'hackathon')->first();
        if (empty($workshop)) {
            abort(404);
        }
        return view('workshopDetail', compact('workshop'));
    }
}
