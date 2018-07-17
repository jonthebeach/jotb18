<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speakers;
use App\Supporters;
use DB;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speakers::where('published', 1)->where('home', true)->orderBy('order', 'asc')->get();
        $supporters = DB::table('supporters')->where('published', 1)->where('type', 'supporter')->get();
        $organizers = DB::table('supporters')->where('published', 1)->where('type', 'organizer')->get();
        $collaborators = json_decode(File::get(resource_path('/assets/collaborators/collaborators.json')));

        return view('home', compact('speakers', 'supporters', 'organizers', 'collaborators'));
    }
}
