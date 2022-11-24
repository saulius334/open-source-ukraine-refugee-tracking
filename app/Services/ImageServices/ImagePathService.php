<?php 

namespace App\Services\ImageServices;

use App\Models\Refugee;
use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function saveImage($photo = null, ?Refugee $refugee = null)
    {
        if (!$photo && !$refugee) {
            return '';
        } else if (!$photo && $refugee) {
            return $refugee->photo;
        } else {
            $imagePath = $photo->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();
            return $imagePath;
        }
    }
}