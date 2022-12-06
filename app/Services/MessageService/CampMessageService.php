<?php

declare(strict_types=1);

namespace App\Services\MessageService;

use App\Enums\MessageEnum;

class CampMessageService
{
    private const TEXT = 'Camp ';
    public function StoreMessage(): string
    {
        return $this::TEXT . MessageEnum::Created;
    }

    public function UpdateMessage(): string
    {
        return $this::TEXT . MessageEnum::Updated;
    }

    public function DeleteMessage(): string
    {
        return $this::TEXT .  MessageEnum::Deleted;
    }
}