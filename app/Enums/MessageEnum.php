<?php

declare(strict_types=1);

namespace App\Enums;

enum MessageEnum: string
{
    public const Created = 'Created successfully!';
    public const Updated = 'Updated Successfully';
    public const Deleted = 'Deleted Successfully!';
    public const Added = 'Added Successfully';
    public const RequestSent = 'Request sent!';
}