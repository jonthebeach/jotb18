<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\SponsorsGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorsGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorsGroups = SponsorsGroups::orderBy('order', 'ASC')->get();
        return view('admin.sponsorsGroups.index', compact('sponsorsGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsorsGroups.create');
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

        SponsorsGroups::create($input);
        return redirect(action('SponsorsGroupsController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorsGroups $sponsorsGroup)
    {
        return redirect(action('Admin\SponsorsGroupsController@edit', $sponsorsGroup->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorsGroups $sponsorsGroup)
    {
        return view('admin.sponsorsGroups.edit', compact('sponsorsGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorsGroups $sponsorsGroup)
    {
        $input = $request->all();

        $sponsorsGroup->update($input);
        return redirect(action('Admin\SponsorsGroupsController@edit', $sponsorsGroup->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorsGroups $sponsorsGroup)
    {
        $sponsorsGroup->delete();
        return redirect(action('SponsorsGroupsController@index'));
    }
    
    /**
     * Save the new order.
     *
     * @param  \App\SponsorsGroups  $speakers
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $speaker = SponsorsGroups::find($id);
            $speaker->order = $order + 1;
            $speaker->update();
        }
        return back();
    }
}
