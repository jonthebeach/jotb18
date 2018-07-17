<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\ScheduleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleItemController extends Controller
{
    /**
     * Return the input correctly formated
     */
    private function formatInput(Request $request)
    {
        $input = $request->except('start_time', 'end_time');
        $time = $request->only('start_time', 'end_time');
        $day = $request->day;
        $time = array_map(function ($item) use ($day) {
            return date_format(date_create($day . ' ' . $item), "Y-m-d H:i:s");
        }, $time);
        
        return (array_merge($input, $time));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduleItem = ScheduleItem::orderBy('start_time', 'asc')->get();
        
        return view('admin.scheduleItem.index', compact('scheduleItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scheduleItem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scheduleItem = ScheduleItem::create($this::formatInput($request));

        return redirect(action('ScheduleItemController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScheduleItem  $scheduleItem
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleItem $scheduleItem)
    {
        return redirect(action('Admin\ScheduleItemController@edit', $scheduleItem->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScheduleItem  $scheduleItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleItem $scheduleItem)
    {
        return view('admin.scheduleItem.edit', compact('scheduleItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScheduleItem  $scheduleItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleItem $scheduleItem)
    {
        $scheduleItem->update($this::formatInput($request));

        return redirect(action('Admin\ScheduleItemController@edit', $scheduleItem->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScheduleItem  $scheduleItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleItem $scheduleItem)
    {
        $scheduleItem->delete();
        return redirect('admin/scheduleItem');
    }
}
