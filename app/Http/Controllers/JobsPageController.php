<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\Sponsors;

class JobsPageController extends Controller
{
    /**
     * Show the index page of jobs
     */
    public function index()
    {
        $sponsorsGroups = Sponsors::join('jobs', 'jobs.sponsors_id', '=', 'sponsors.id')
            ->join('sponsors_groups', 'sponsors_groups.id', '=', 'sponsors.sponsors_groups_id')
            ->whereNotNull('jobs.sponsors_id')
            ->where('sponsors.published', 1)
            ->where('sponsors_groups.published', 1)
            ->orderBy('sponsors_groups.order', 'ASC')
            ->select('sponsors.*')
            ->distinct()
            ->get()
            ->groupBy('sponsors_groups_id');

        return view('jobs', compact('jobsGroups', 'sponsorsGroups'));
    }


    /**
     * Show a specidfic job detail page
     */
    public function detail(Sponsors $sponsor)
    {
        return view('jobDetail', compact('sponsor'));
    }
}
