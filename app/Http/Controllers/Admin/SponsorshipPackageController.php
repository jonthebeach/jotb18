<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SponsorshipPackageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sponsorshipPackage.index');
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
        if ($request->hasFile('sponsorship')) {
            $image = $request->file('sponsorship');
            $relativePath = '/files/';
            $destinationPath = public_path($relativePath);
            $fileName = 'Sponsorships_Packages_JOTB18.pdf';
            $image->move($destinationPath, $fileName);
        }

        return redirect('admin/speakers');
    }
}
