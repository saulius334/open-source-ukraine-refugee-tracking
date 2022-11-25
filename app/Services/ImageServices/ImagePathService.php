<?php

namespace App\Services\ImageServices;

use App\Models\Refugee;
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

    public function updateImageAndGetPath(Refugee $refugee, ?UploadedFile $photo = null): mixed
    {
        if (!$photo) {
            return $refugee->photo;
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

    public function unlink(?UploadedFile $photo = null): void
    {
        if ($photo) {
            unlink(public_path() . '/storage/' . $photo);
        }
    }
}
