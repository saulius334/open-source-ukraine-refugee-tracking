<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public function saveAndGetPath(?UploadedFile $photo, ?string $subject = null): ?string
    {
        if (!$photo && !$subject) {
            return null;
        } elseif (!$photo) {
            return $subject;
        } else {
            return $photo->store('uploads', 'public');
        }
    }

    public function unlink(string $photo): void
    {
        unlink(public_path() . '/storage/' . $photo);
    }
}
