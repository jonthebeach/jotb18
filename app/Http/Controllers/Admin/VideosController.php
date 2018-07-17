<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::orderBy('video_groups_id', 'asc')->orderBy('order', 'asc')->get();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
        Videos::create($input);
        return redirect('admin/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $video)
    {
        return redirect(action('Admin\VideosController@edit', $video->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function edit(Videos $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $video)
    {
        $input = $request->all();
        $video->update($input);

        return redirect(action('Admin\VideosController@edit', $video->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $video)
    {
        $video->delete();
        return redirect('admin/videos');
    }

    /**
     * Save the new order.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $video = Videos::find($id);
            $video->order = $order + 1;
            $video->update();
        }
        return back();
    }
}
