<?php 

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function generatePath($photo)
    {
        $imagePath = $photo->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
        $image->save();
        return $imagePath;
    }
}