<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class TalksOverviewPageController extends Controller
{
    /**
     * Show the index page
     */
    public function index($hall, $day)
    {
        $resultArray = \App\ScheduleItem::where('day', date_create("2018-05-$day")->format('Y-m-d'))
            ->where('published', '1')
            ->where('break', '0')
            ->where('message', null)
            ->orderBy('start_time')
            ->get()
            ->groupBy('hall');

        if (isset($resultArray[$hall])) {
            $scheduleItemsByHall[$hall] = $resultArray[$hall];
            unset($resultArray[$hall]);
            foreach ($resultArray as $indexHall => $item) {
                $scheduleItemsByHall[$indexHall] = $item;
            }
        } else {
            $scheduleItemsByHall = $resultArray;
        }
        return view('talks-overview.talks-overview', compact('scheduleItemsByHall'));
    }
}
