<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\SponsorsGroups;

class SponsorsPageController extends Controller
{
    /**
     * Show the index page of jobs
     */
    public function index()
    {
        $sponsorsTable = json_decode(File::get(resource_path('/assets/packs/packs.json')));
        $packs = SponsorsGroups::where('published', true)->where('pack', true)->orderBy('order', 'ASC')->get();
        return view('sponsors', compact('sponsorsTable', 'packs'));
    }
}
