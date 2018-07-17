<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorsGroups extends Model
{
    protected $guarded  = [
        'id'
    ];


    /**
     * Return the list of sponsors associated to this speaker
     * @return Array
     */
    public function sponsors()
    {
        return $this->hasMany(Sponsors::class);
    }
}
