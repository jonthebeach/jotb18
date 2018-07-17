<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Speakers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speakers::orderBy('order', 'asc')->get();
        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $relativePath = '/images/speakers';
            $destinationPath = public_path($relativePath);
            $imageName = str_replace(' ', '', $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension());
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        Speakers::create($input);
        return redirect('admin/speakers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speakers  $speakers
     * @return \Illuminate\Http\Response
     */
    public function show(Speakers $speaker)
    {
        return redirect(action('Admin\SpeakersController@edit', $speaker->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speakers  $speakers
     * @return \Illuminate\Http\Response
     */
    public function edit(Speakers $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speakers  $speakers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speakers $speaker)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $speaker->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/speakers';
            $destinationPath = public_path($relativePath);
            $imageName =  str_replace(' ', '', $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension());
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $speaker->update($input);

        return redirect(action('Admin\SpeakersController@edit', $speaker->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speakers  $speakers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speakers $speaker)
    {
        $speaker->delete();
        return redirect('admin/speakers');
    }

    /**
     * Save the new order.
     *
     * @param  \App\Speakers  $speakers
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $speaker = Speakers::find($id);
            $speaker->order = $order + 1;
            $speaker->update();
        }
        return back();
    }
}
