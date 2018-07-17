<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Imagecow\Image;

class EventImagesFiles extends Model
{
    protected $guarded = [];

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

        if (isset($this->thumbnailPath) && file_exists(public_path($this->thumbnailPath))) {
            unlink(public_path($this->thumbnailPath));
        }
    }

    
    /**
     * Save a list of images in the DB
     */
    public static function saveImages($images, $eventImageId)
    {
        foreach ($images as $index => $image) {
            $relativePath = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'eventImages';
            $destinationPath = public_path() . $relativePath;
            $imageNameWithoutExtension = str_replace(' ', '', time() . $index);
            $imageName = $imageNameWithoutExtension . '.' . $image->getClientOriginalExtension();
            
            // I create the thumbnail and the original
            $thumbnail = $destinationPath . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $imageName;
            $original = $destinationPath . DIRECTORY_SEPARATOR . $imageName;
            $image->move($destinationPath, $imageName);
            copy($original, $thumbnail);

            // I resize and crop the thumbnail
            $imageTest = Image::fromFile($thumbnail);
            $imageTest->resizeCrop(350, 200, 'center', 'middle');
            $imageTest->save();

            // I add the needed fields to the db
            $eventImageFile['event_images_id'] = $eventImageId;
            $eventImageFile['imagePath'] = $relativePath . DIRECTORY_SEPARATOR . $imageName;
            $eventImageFile['thumbnailPath'] = $relativePath . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $imageName;

            EventImagesFiles::create($eventImageFile);
        }
    }
}
