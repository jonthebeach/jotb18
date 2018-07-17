<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'twitter',
        'position',
        'company',
        'description',
        'imagePath',
        'hype',
        'published'
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
}
