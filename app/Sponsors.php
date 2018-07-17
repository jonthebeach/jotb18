<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    protected $guarded = [
        'id'
    ];

    /**
     * Delete he model
     */
    public function delete()
    {
        $this->deleteImage();
        parent::delete();
    }

    /**
     * Delete the image
     */
    public function deleteImage()
    {
        if (isset($this->imagePath) && file_exists(public_path($this->imagePath))) {
            unlink(public_path($this->imagePath));
        }
    }

    /**
     * Return the sponsor group associated to this sponsor
     * @return Array
     */
    public function sponsorsGroups()
    {
        return $this->belongsTo(SponsorsGroups::class);
    }


    /**
     * Return the list of jobs associated to this sponsor
     * @return Array
     */
    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}
