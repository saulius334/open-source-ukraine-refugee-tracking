<?php

declare(strict_types=1);

namespace App\Services\Refugee;

use App\Enums\MessageEnum;

class RefugeeMessageService
{
    private const TEXT = 'Refugee ';
    public function storeMessage(bool $confirmed): string
    {
        return $confirmed ? $this::TEXT . MessageEnum::Created : MessageEnum::RequestSent;
    }

    public function updateMessage(bool $confirmed): string
    {
        return $this::TEXT . ($confirmed ? MessageEnum::Updated : MessageEnum::Added); 
    }

    public function deleteMessage(): string
    {
        return $this::TEXT . MessageEnum::Deleted; 
    }
}