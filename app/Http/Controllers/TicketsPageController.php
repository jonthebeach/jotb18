<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use \App\Workshops;

class TicketsPageController extends Controller
{
    /**
     * Show the index page
     */
    public function index()
    {
        $tickets = json_decode(File::get(resource_path('/assets/tickets/tickets.json')));
        $workshops = Workshops::where('published', 1)->orderBy('order', 'asc')->orderBy('type', 'asc')->get();
        
        return view('tickets', compact('tickets', 'workshops'));
    }
}
