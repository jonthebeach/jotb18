<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\VideoGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoGroups = VideoGroups::orderBy('order', 'asc')->get();
        return view('admin.videoGroups.index', compact('videoGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videoGroups.create');
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

        VideoGroups::create($input);
        return redirect('admin/video-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoGroups  $videoGroups
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGroups $videoGroup)
    {
        return redirect(action('Admin\VideoGroupsController@edit', $videoGroup->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoGroups  $videoGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoGroups $videoGroup)
    {
        return view('admin.videoGroups.edit', compact('videoGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoGroups  $videoGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoGroups $videoGroup)
    {
        $input = $request->all();
        $videoGroup->update($input);

        return redirect(action('Admin\VideoGroupsController@edit', $videoGroup->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoGroups  $videoGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoGroups $videoGroup)
    {
        $videoGroup->delete();
        return redirect('admin/video-groups');
    }

    /**
     * Save the new order.
     *
     * @param  \App\VideoGroups  $videoGroups
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $videoGroup = VideoGroups::find($id);
            $videoGroup->order = $order + 1;
            $videoGroup->update();
        }
        return back();
    }
}
