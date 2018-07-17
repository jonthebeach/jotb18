<?php

namespace App;

use File;

class Day
{

    /**
     * Return all the days for the talks
     * @return Array
     */
    public static function all()
    {
        $days = json_decode(File::get(resource_path('/assets/days/days.json')));

        return $days;
    }

    /**
     * Return the list of days for the workshops and hackathon
     * @return Array
     */
    public static function getDaysWorkshops()
    {
        $days = json_decode(File::get(resource_path('/assets/days/daysWorkshops.json')));

        return $days;
    }
}
