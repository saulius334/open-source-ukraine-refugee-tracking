<?php

declare(strict_types=1);

namespace App\Services\Refugee\DTO;

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

    public function setImage($path): void
    {
        $this->refugeeInfo['photo'] = $path;
    }

    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'IdNumber' => $request->get('IdNumber'),
            'bedsTaken' => $request->get('bedsTaken'),
            'confirmed' => $request->get('confirmed'),
            'current_refugee_camp_id' => $request->get('current_refugee_camp_id'),
            'photo' => $request->get('photo'),
            'pets' => $request->get('pets'),
            'destination' => $request->get('destination'),
            'aidReceived' => $request->get('aidReceived'),
            'healthCondition' => $request->get('healthCondition')
        ]);
    }
}
