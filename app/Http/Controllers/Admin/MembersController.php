<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
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
            $relativePath = '/images/members';
            $destinationPath = public_path($relativePath);
            $imageName = $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        Members::create($input);
        return redirect('admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show(Members $member)
    {
        return redirect(action('Admin\MembersController@edit', $member->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Members $member)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $member->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/members';
            $destinationPath = public_path($relativePath);
            $imageName = $input['firstname'] . $input['lastname'] . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $member->update($input);

        return redirect(action('Admin\MembersController@edit', $member->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $member)
    {
        $member->delete();
        return redirect('admin/members');
    }
}
