<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    protected $guarded = [
        'id',
        'image'
    ];

    /**
     * Get the full name
     * @return String The full name
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
        foreach ($this->getImages() as $evenImageFile) {
            $evenImageFile->delete();
        }
        parent::delete();
    }

    /**
     * Get all the images associated to the eventImage group
     * @return App\EventImagesFiles List of all the event images files that match
     */
    public function getImages()
    {
        return EventImagesFiles::where('event_images_id', $this->id)->get();
    }
}
