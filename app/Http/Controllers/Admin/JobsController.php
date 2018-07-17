<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobs::orderBy('order', 'ASC')->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.create');
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
        Jobs::create($input);
        return redirect('admin/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $job)
    {
        return redirect(action('Admin\JobsController@edit', $job->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobs $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobs $job)
    {
        $input = $request->all();
        $input['url'] = prep_url($input['url']);
        $job->update($input);
        return redirect(action('Admin\JobsController@edit', $job->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect('admin/jobs');
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
            $speaker = Jobs::find($id);
            $speaker->order = $order + 1;
            $speaker->update();
        }
        return back();
    }
}
