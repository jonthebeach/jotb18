<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshops extends Model
{
    protected $guarded = [
        'id'
    ];
    
    /**
     * Given a day Id it returns the right time
     */
    public function getTime($dayId)
    {
        switch ($dayId) {
            case 1:
                $time = $this->day1;
                break;
            case 2:
                $time = $this->day2;
                break;
            case 3:
                $time = $this->day3;
                break;
            default:
                $time = null;
                break;
        }
        return $time;
    }

    /**
     * Return the list of speakers associated to this workshop
     * @return Array
     */
    public function speakers()
    {
        return $this->belongsToMany(Speakers::class, 'speaker_workshop', 'workshop_id', 'speaker_id');
    }

    /**
     * Get only the workshops
     */
    public static function getOnlyWorkshops()
    {
        return Workshops::where('type', '<>', 'hackathon')->get();
    }

    /**
     * Get only hackathon
     */
    public static function getHackatons()
    {
        return Workshops::where('type', 'hackathon')->get();
    }
}
