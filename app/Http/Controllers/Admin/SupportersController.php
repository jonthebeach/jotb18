<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Supporters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supporters = Supporters::get();
        return view('admin.supporters.index', compact('supporters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supporters.create');
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
            $relativePath = '/images/supporters';
            $destinationPath = public_path($relativePath);
            $imageName = $input['title'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        Supporters::create($input);
        return redirect('admin/supporters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supporters $supporter)
    {
        return redirect(action('Admin\SupportersController@edit', $supporter->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supporters $supporter)
    {
        return view('admin.supporters.edit', compact('supporter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supporters $supporter)
    {
        $input = $request->all();
        if ($request->hasFile('imagePath')) {
            $supporter->deleteImage();
            $image = $request->file('imagePath');
            $relativePath = '/images/supporters';
            $destinationPath = public_path($relativePath);
            $imageName = $input['title'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        $input['url'] = prep_url($input['url']);

        $supporter->update($input);
        return redirect(action('Admin\SupportersController@edit', $supporter->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supporters $supporter)
    {
        $supporter->delete();
        return redirect('admin/supporters');
    }
}
