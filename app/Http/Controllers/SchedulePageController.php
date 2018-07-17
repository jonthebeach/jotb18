<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Levels;
use \App\Topics;
use \App\ScheduleItem;

class SchedulePageController extends Controller
{
    /**
     * Show the index page
     */
    public function index()
    {
        $levels = Levels::all();
        $topics = Topics::orderBy('order', 'asc')->get();
        $scheduleItems = ScheduleItem::orderBy('start_time', 'asc')->get();
        return view('schedule', compact('levels', 'topics', 'scheduleItems'));
    }

    /**
     * Show the specific date
     */
    public function date($date)
    {
        $days = \App\Day::all();

        foreach (\App\Day::all() as $day) {
            if (strtotime($day) == $date) {
                $itemsPerDay = ScheduleItem::orderBy('start_time', 'asc')->get()->groupBy('day')[$day];
                return view('partials.scheduleTalks', compact('itemsPerDay'));
            }
        }
        return view('partials.scheduleWorkshops');
    }
}
