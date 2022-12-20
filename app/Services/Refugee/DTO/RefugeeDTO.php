<?php

declare(strict_types=1);

namespace App\Services\Refugee\DTO;

use App\Services\Refugee\ImageService;
use Illuminate\Http\Request;
use App\Services\Shared\Interfaces\RequestDTOInterface;

class RefugeeDTO implements RequestDTOInterface
{
    public function __construct(private array $refugeeInfo)
    {
    }

    public function getAllData(): array
    {
        return $this->refugeeInfo;
    }

    public function isConfirmed(): bool
    {
        return (bool)$this->refugeeInfo['confirmed'];
    }

    public static function fromRequest(Request $request, ?string $imagePath = null): self
    {
        $imagePath = (new ImageService())->saveAndGetPath($request->file('photo'), $imagePath);

        return new self([
            'name' => $request->name,
            'surname' => $request->surname,
            'IdNumber' => $request->IdNumber,
            'bedsTaken' => $request->bedsTaken,
            'confirmed' => $request->confirmed,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition
        ]);
    }
}
