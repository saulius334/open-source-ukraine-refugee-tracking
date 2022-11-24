<?php 

namespace App\Services\ImageServices;

use App\Models\Refugee;
use Intervention\Image\Facades\Image;

class ImagePathService
{
    public function saveAndGeneratePath($photo = null)
    {
        if (!$photo) {
            return '';
        } else {
            $imagePath = $photo->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();
            return $imagePath;
        }
    }
    public function saveOrReturnOldPath(Refugee $refugee, $photo = null)
    {
        if (!$photo) {
            return $refugee->photo;
        } else {
            $imagePath = $photo->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600,600);
            $image->save();
            return $imagePath;
        }
    }
}