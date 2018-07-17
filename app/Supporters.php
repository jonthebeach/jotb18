<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supporters extends Model
{
    protected $fillable = [
        'title',
        'url',
        'imagePath',
        'type',
        'published'
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
}
