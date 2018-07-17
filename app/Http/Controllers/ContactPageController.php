<?php

namespace App\Http\Controllers;

class ContactPageController extends Controller
{
    /**
     * Show the contact page
     */
    public function index()
    {
        return view('contact');
    }
}
