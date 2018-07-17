<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    protected $guarded = [
        'id',
        'image'
    ];

    /**
     * Get the full name
     * @return: The full name
     */
    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

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
     * Return the list of workshops associated to this speaker
     * @return Array
     */
    public function workshops()
    {
        return $this->belongsToMany(Workshops::class, 'speaker_workshop', 'speaker_id', 'workshop_id');
    }

    /**
     * Return the list of talks associated to this speaker
     * @return Array
     */
    public function talks()
    {
        return $this->belongsToMany(Talk::class, 'speaker_talk', 'speaker_id', 'talk_id');
    }
}
