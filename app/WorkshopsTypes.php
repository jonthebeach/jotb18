<?php

namespace App;

use File;

class WorkshopsTypes
{

    /**
     *
     * Get the list of available workshopTypes
     */
    public static function all()
    {
        $workshopsTypes = json_decode(File::get(resource_path('/assets/workshopsTypes/workshopsTypes.json')));

        return $workshopsTypes;
    }
}
