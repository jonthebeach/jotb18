<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talk';
    protected $guarded = [
        'id'
    ];

    /**
     * Return the list of speakers associated to this workshop
     * @return Array
     */
    public function speakers()
    {
        return $this->belongsToMany(Speakers::class, 'speaker_talk', 'talk_id', 'speaker_id');
    }

    /**
     * Return the schedule item where the talk takes place
     * @return Array
     */
    public function scheduleItem()
    {
        return $this->hasOne(ScheduleItem::class);
    }

    /**
     * Return the topic assigned to the talk
     * @return Topics
     */
    public function topic()
    {
        return $this->belongsTo(Topics::class);
    }
}
