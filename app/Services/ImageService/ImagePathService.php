<?php

namespace App\Services\ImageServices;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function storeImageAndGetPath(?UploadedFile $photo = null): mixed
    {
        if (!$photo) {
            return null;
        }
        return $this->saveImage($photo);
    }
 /**@fixme please */
    public function updateImageAndGetPath(?Model $subject = null, $photo = null): mixed
    {
        if (!$subject && !$photo) {
            return null;
        }
        
        elseif (!$photo) {
            return $subject->photo;
        }
        return $this->saveImage($photo);
    }

    private function saveImage(UploadedFile $photo): string
    {
        $imagePath = $photo->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();
        return $imagePath;
    }

    public function unlink($photo = null): void
    {
        if ($photo) {
            unlink(public_path() . '/storage/' . $photo);
        }
    }
}
