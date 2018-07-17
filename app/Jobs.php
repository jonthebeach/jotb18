<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $guarded = [
        'id'
    ];

    /**
     * Return the sponsor associated to this job
     * @return Array
     */
    public function sponsors()
    {
        return $this->belongsTo(Sponsors::class);
    }
}
