<?php

namespace App;

use File;

class Halls
{

    /**
     * @description
     * Get the list of available halls
     */
    public static function all()
    {
        $hallsObject = json_decode(File::get(resource_path('/assets/halls/halls.json')));

        foreach ($hallsObject as $hall) {
            $halls[] = $hall->name;
        }

        return $halls;
    }

    /**
     * @description Return the Google doc url by the url
     */
    public static function getGoogleDocByHall($hall)
    {
        $hallsObject = json_decode(File::get(resource_path('/assets/halls/halls.json')));
        foreach ($hallsObject as $hallObject) {
            if ($hallObject->name === $hall) {
                $result = $hallObject->googleUrl;
                break;
            }
        }

        return $result;
    }

    /**
     * @description Return the Google doc url to be redirected by the url
     */
    public static function getGoogleDocRedirectByHall($hall)
    {
        $hallsObject = json_decode(File::get(resource_path('/assets/halls/halls.json')));
        foreach ($hallsObject as $hallObject) {
            if ($hallObject->name === $hall) {
                $result = $hallObject->googleRedirect;
                break;
            }
        }

        return $result;
    }

    /**
     * @description
     * Get the list of available halls for workshops
     */
    public static function getHallsWorkshops()
    {
        $halls = json_decode(File::get(resource_path('/assets/halls/hallsWorkshops.json')));

        return $halls;
    }
}
