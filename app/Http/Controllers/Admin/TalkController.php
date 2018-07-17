<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talk = Talk::orderBy('title', 'asc')->get();
        
        return view('admin.talk.index', compact('talk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.talk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('speakers_id');
        $speakersId = $request->speakers_id;
        $speakersId = array_filter($speakersId, function ($e) {
            return ($e !== null);
        });
        $talk = Talk::create($input);
        $talk->speakers()->sync($speakersId);

        return redirect('admin/talk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        return redirect(action('Admin\TalkController@edit', $talk->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function edit(Talk $talk)
    {
        return view('admin.talk.edit', compact('talk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talk $talk)
    {
        $input = $request->except('speakers_id');
        $speakersId = $request->speakers_id;
        $speakersId = array_filter($speakersId, function ($e) {
            return ($e !== null);
        });
        if ($request->hasFile('image')) {
            $talk->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/talk';
            $destinationPath = public_path($relativePath);
            $imageName = $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $talk->update($input);
        $talk->speakers()->sync($speakersId);

        return redirect(action('Admin\TalkController@edit', $talk->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talk $talk)
    {
        $talk->delete();
        return redirect('admin/talk');
    }

    /**
     * Save the new order.
     *
     * @param  \App\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $talk = Talk::find($id);
            $talk->order = $order + 1;
            $talk->update();
        }
        return back();
    }
}
