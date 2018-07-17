<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Workshops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshops::orderBy('order', 'asc')->orderBy('type', 'asc')->get();
        return view('admin.workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workshops.create');
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
        $workshop = Workshops::create($input);
        $workshop->speakers()->sync($speakersId);
        
        return redirect('admin/workshops');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function show(Workshops $workshop)
    {
        return redirect(action('Admin\WorkshopsController@edit', $workshop->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshops $workshop)
    {
        return view('admin.workshops.edit', compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workshops $workshop)
    {
        $input = $request->except('speakers_id');
        $speakersId = $request->speakers_id;
        $speakersId = array_filter($speakersId, function ($e) {
            return ($e !== null);
        });
        if ($request->hasFile('image')) {
            $workshop->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/workshops';
            $destinationPath = public_path($relativePath);
            $imageName = $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $workshop->update($input);
        $workshop->speakers()->sync($speakersId);

        return redirect(action('Admin\WorkshopsController@edit', $workshop->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshops $workshop)
    {
        $workshop->delete();
        return redirect('admin/workshops');
    }

    /**
     * Save the new order.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $workshop = Workshops::find($id);
            $workshop->order = $order + 1;
            $workshop->update();
        }
        return back();
    }
}
