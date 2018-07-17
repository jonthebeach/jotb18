<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\BlogItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogItems = BlogItems::orderBy('order', 'asc')->get();
        return view('admin.blogItems.index', compact('blogItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogItems.create');
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
            $relativePath = '/images/blogItems';
            $destinationPath = public_path($relativePath);
            $imageName = str_replace(' ', '', $input['title'] . time() . '.' . $image->getClientOriginalExtension());
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }

        BlogItems::create($input);
        return redirect('admin/blog-items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogItems  $blogItems
     * @return \Illuminate\Http\Response
     */
    public function show(BlogItems $blogItem)
    {
        return redirect(action('Admin\BlogItemsController@edit', $blogItem->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogItems  $blogItems
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogItems $blogItem)
    {
        return view('admin.blogItems.edit', compact('blogItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogItems  $blogItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogItems $blogItem)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $blogItem->deleteImage();
            $image = $request->file('image');
            $relativePath = '/images/blogItems';
            $destinationPath = public_path($relativePath);
            $imageName =  str_replace(' ', '', 'blog' . time() . '.' . $image->getClientOriginalExtension());
            $image->move($destinationPath, $imageName);
            
            $input['imagePath'] = $relativePath . '/' . $imageName;
        }
        $blogItem->update($input);

        return redirect(action('Admin\BlogItemsController@edit', $blogItem->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogItems  $blogItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogItems $blogItem)
    {
        $blogItem->delete();
        return redirect('admin/blog-items');
    }

    /**
     * Save the new order.
     *
     * @param  \App\BlogItems  $blogItems
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $newOrder = explode("|", $request->order);
        foreach ($newOrder as $order => $id) {
            $blogItem = BlogItems::find($id);
            $blogItem->order = $order + 1;
            $blogItem->update();
        }
        return back();
    }
}
