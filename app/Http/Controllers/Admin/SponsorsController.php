<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Sponsors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsors::get();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
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
        if ($request->hasFile('imagePath')) {
            $image = $request->file('imagePath');
            $relativePath = '/images/sponsors';
            $destinationPath = public_path($relativePath);
            $imageName = $input['title'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        Sponsors::create($input);
        return redirect('admin/sponsors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsors $sponsor)
    {
        return redirect(action('Admin\SponsorsController@edit', $sponsor->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsors $sponsor)
    {
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsors $sponsor)
    {
        $input = $request->all();
        if ($request->hasFile('imagePath')) {
            $sponsor->deleteImage();
            $image = $request->file('imagePath');
            $relativePath = '/images/sponsors';
            $destinationPath = public_path($relativePath);
            $imageName = $input['title'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        $input['url'] = prep_url($input['url']);

        $sponsor->update($input);
        return redirect(action('Admin\SponsorsController@edit', $sponsor->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsors $sponsor)
    {
        $sponsor->delete();
        return redirect('admin/sponsors');
    }
}
