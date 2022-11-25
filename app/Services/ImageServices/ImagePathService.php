<?php

namespace App\Services\ImageServices;

use App\Models\Refugee;
use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function storeImageAndGetPath($photo = null)
    {
        if (!$photo) {
            return;
        }
        return $this->saveImage($photo);
    }
    public function updateImageAndGetPath(Refugee $refugee, $photo = null)
    {
        if (!$photo) {
            return $refugee->photo;
        }
        return $this->saveImage($photo);
    }
    public function saveImageAndGetPath($photo = null, ?Refugee $refugee = null)
    {
        if (!$photo && !$refugee) {
            return;
        } elseif (!$photo && $refugee) {
            return $refugee->photo;
        } else {
            $imagePath = $photo->store('uploads', 'public');
            $this->saveImage($imagePath);
            return $imagePath;
        }
    }
    private function saveImage($photo)
    {
        $imagePath = $photo->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();
        return $imagePath;
    }
    public function unlink($subject): void
    {
        if ($subject->photo) {
            unlink(public_path() . '/storage/' . $subject->photo);
        }
    }
}
