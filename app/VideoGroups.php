<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGroups extends Model
{
    protected $guarded = [
        'id',
    ];

    public $youTubeData;
    public static $youTubeApiUrl = 'https://www.googleapis.com/youtube/v3';

    /**
     * Return the list of videos associated to this speaker
     * @return Array
     */
    public function videos()
    {
        return $this->hasMany(Videos::class);
    }

    /**
     * Concat all teh videos ids
     */
    private function getVideosIds()
    {
        return $this->videos->where('published', '1')->implode('youTubeId', ',');
    }
    
    /**
    * Return all the video data from YouTube
    */
    public function getVideosData()
    {
        if (empty($this->youTubeData)) {
            $curl = curl_init($this::$youTubeApiUrl . '/videos?part=snippet&id='. $this->getVideosIds() . '&key=' . env('YOUTUBE_API_KEY'));
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
            ));
            $result = curl_exec($curl);
            $this->youTubeData = json_decode($result)->items;
        }
        
        return $this->youTubeData;
    }
}
