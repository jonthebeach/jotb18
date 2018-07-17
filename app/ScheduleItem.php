<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleItem extends Model
{
    protected $table = 'schedule_item';
    protected $guarded = [
        'id'
    ];

    /**
     * Return the list of talks associated to this schedule item
     * @return Array
     */
    public function talk()
    {
        return $this->belongsTo(Talk::class);
    }
}
