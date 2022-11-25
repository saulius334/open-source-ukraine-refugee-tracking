<?php

namespace App\Services\ImageServices;

use App\Models\Refugee;
use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function saveImageAndGetPath($photo = null, ?Refugee $refugee = null)
    {
        if (!$photo && !$refugee) {
            return '';
        } elseif (!$photo && $refugee) {
            return $refugee->photo;
        } else {
            $imagePath = $photo->store('uploads', 'public');
            $this->saveImage($imagePath);
            return $imagePath;
        }
    }
    public function unlink($subject)
    {
        if ($subject->photo !== '') {
            unlink(public_path() . '/storage/' . $subject->photo);
        }
    }
    private function saveImage($imagePath)
    {
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();
    }
}
