<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\BlogItems;

class BlogItemsPageController extends Controller
{
    /**
     * Show the index page of jobs
     */
    public function index()
    {
        $blogItems = BlogItems::where('published', 1)->orderBy('order', 'ASC')->get();
        return view('blogItems', compact('blogItems'));
    }

    /**
     * Show a specidfic job detail page
     */
    public function detail(BlogItems $blogItem)
    {
        return view('blogItemDetail', compact('blogItem'));
    }
}
