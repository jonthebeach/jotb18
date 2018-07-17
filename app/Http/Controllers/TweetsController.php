<?php

namespace App\Http\Controllers;

class TweetsController extends Controller
{
    /**
     * Return all the tweets
     */
    public function index()
    {
        $parameters = [
            'include_rts' => false,
            'screen_name' => 'jotb2018',
            'count' => 1,
            'format' => 'array',
            'exclude_replies' => true
        ];
    
        /**
         * If the Twitter Api fails, I get a saved tweet to sho something
         * @todo Cache the last tweet known
         */
        try {
            $tweets = \Twitter::getUserTimeline($parameters);
        } catch (\Exception $e) {
            $tweets = json_decode(file_get_contents(resource_path() . '/tweet/results.json'));
        }
        
        return $tweets;
    }
}
