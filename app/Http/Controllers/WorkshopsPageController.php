<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Workshops;

class WorkshopsPageController extends Controller
{
    /**
     * Show the list of workshops
     */
    public function index()
    {
        $workshopsGroups = Workshops::where('published', 1)->where('type', '<>', 'hackathon')->orderBy('order', 'asc')->orderBy('type', 'asc')->get()->groupBy('type');
        return view('workshops', compact('workshopsGroups'));
    }

    /**
     * Show the specific page for a workshop
     */
    public function detail(Workshops $workshop)
    {
        return view('workshopDetail', compact('workshop'));
    }
}
