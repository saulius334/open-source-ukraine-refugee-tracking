<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public function saveAndGetPath(?UploadedFile $photo, ?string $subject): string
    {
        if (!$photo && !$subject) {
            return '';
        } elseif (!$photo && $subject) {
            return $subject;
        } else {
            return $photo->store('uploads', 'public');
        }
    }
}
