<?php

namespace App;

use File;

class Levels
{
    public static function all()
    {
        $levels = json_decode(File::get(resource_path('/assets/levels/levels.json')));

        return $levels;
    }
}
