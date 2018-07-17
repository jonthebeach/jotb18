<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $guarded = [
        'id',
    ];
    public $youTubeData;
    public static $youTubeApiUrl = 'https://www.googleapis.com/youtube/v3';

    /**
     * Return all the video data from YouTube
     */
    public function getVideoInfo()
    {
        if (empty($this->youTubeData)) {
            $curl = curl_init($this::$youTubeApiUrl . '/videos?part=snippet&id='. $this->youTubeId . '&key=' . env('YOUTUBE_API_KEY'));
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
            ));
            $result = json_decode(curl_exec($curl));
            if (empty($result->items)) {
                $this->youTubeData = [];
            } else {
                $this->youTubeData = $result->items[0]->snippet;
            }
        }
        
        return $this->youTubeData;
    }

    /**
     * Get the video title when the youtube Id is ok
     */
    public function getVideoTitle()
    {
        return !empty($this->getVideoInfo()) ? $this->getVideoInfo()->title : 'INVALID YOUTUBE ID';
    }

    /**
     * Return the sponsor group associated to this sponsor
     * @return Array
     */
    public function videoGroups()
    {
        return $this->belongsTo(VideoGroups::class, 'video_groups_id');
    }
}
