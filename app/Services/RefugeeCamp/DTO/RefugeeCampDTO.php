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

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->get('name'),
            'user_id' => $request->user()->id,
            'originalCapacity' => $request->get('originalCapacity'),
            'currentCapacity' => $request->get('originalCapacity'),
            'coords_lat' => $request->get('coords_lat'),
            'coords_lng' => $request->get('coords_lng'),
            'rooms' => $request->get('rooms'),
            'volunteers' => $request->get('volunteers'),
            'current_refugee_camp_id' => $request->get('current_refugee_camp_id'),
        ]);
    }
}
