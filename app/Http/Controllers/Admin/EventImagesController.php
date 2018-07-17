<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\EventImages;
use App\EventImagesFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventImages = EventImages::orderBy('order', 'asc')->get();
        return view('admin.eventImages.index', compact('eventImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventImages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('images');
        $eventImage = EventImages::create($input);

        if ($request->hasFile('images')) {
            \App\EventImagesFiles::saveImages($request->file('images'), $eventImage->id);
        }
        
        return redirect('admin/event-images');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function show(EventImages $eventImage)
    {
        return redirect(action('Admin\EventImagesController@edit', $eventImage->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function edit(EventImages $eventImage)
    {
        return view('admin.eventImages.edit', compact('eventImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventImages $eventImage)
    {
        $input = $request->except('images');
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                \App\EventImagesFiles::saveImages($request->file('images'), $eventImage->id);
            }
        }
        $eventImage->update($input);

        return redirect(action('Admin\EventImagesController@edit', $eventImage->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventImages $eventImage)
    {
        $eventImage->delete();
        return redirect('admin/event-images');
    }

    /**
     * Save the new order.
     *
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $eventImage = EventImages::find($id);
            $eventImage->order = $order + 1;
            $eventImage->update();
        }
        return back();
    }
}
