<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp\DTO;

use Illuminate\Http\Request;
use App\Services\Shared\Interfaces\RequestDTOInterface;

class RefugeeCampDTO implements RequestDTOInterface
{
    public function __construct(private array $refugeeCampInfo)
    {
    }

    public function getAllData(): array
    {
        return $this->refugeeCampInfo;
    }

    public function setCurrentCapacity(int $capacity): void
    {
        $this->refugeeCampInfo['currentCapacity'] = $capacity;
    }

    public function getCurrentCapacity(): int
    {
        return $this->refugeeCampInfo['currentCapacity'];
    }

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->name,
            'user_id' => $request->user()->id,
            'originalCapacity' => $request->originalCapacity,
            'currentCapacity' => $request->originalCapacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
        ]);
    }
}
