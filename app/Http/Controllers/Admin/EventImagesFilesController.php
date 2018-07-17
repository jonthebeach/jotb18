<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\EventImagesFiles;

class EventImagesFilesController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventImagesFiles  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventImagesFiles $eventImagesFile)
    {
        $eventImagesFile->delete();
        return redirect()->back();
    }
}
