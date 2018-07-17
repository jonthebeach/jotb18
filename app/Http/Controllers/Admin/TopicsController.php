<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topics::orderBy('order', 'asc')->get();
        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topics.create');
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
        Topics::create($input);
        return redirect('admin/topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function show(Topics $topic)
    {
        return redirect(action('Admin\TopicsController@edit', $topic->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function edit(Topics $topic)
    {
        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topics $topic)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $topic->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/topics';
            $destinationPath = public_path($relativePath);
            $imageName = $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $topic->update($input);

        return redirect(action('Admin\TopicsController@edit', $topic->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topics $topic)
    {
        $topic->delete();
        return redirect('admin/topics');
    }

    /**
     * Save the new order.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $topic = Topics::find($id);
            $topic->order = $order + 1;
            $topic->update();
        }
        return back();
    }
}
