<?php 

namespace App\Services\ImageServices;

class ImageUnlink
{
    public function unlink($subject)
    {
        if($subject->photo !== '') {
            unlink(public_path().'/storage/'. $subject->photo);
        }
    }
}