<?php

declare(strict_types=1);

namespace App\Services\MessageService;

use App\Enums\MessageEnum;

class RefugeeMessageService
{
    private const TEXT = 'Refugee ';
    public function StoreMessage(bool $confirmed): string
    {
        return $confirmed ? $this::TEXT . MessageEnum::Created : MessageEnum::RequestSent;
    }

    public function UpdateMessage(int $request, int $refugee): string
    {
        return $this::TEXT . ($request === $refugee ? MessageEnum::Updated : MessageEnum::Added); 
    }

    public function deleteMessage(): string
    {
        return $this::TEXT . MessageEnum::Deleted; 
    }
}