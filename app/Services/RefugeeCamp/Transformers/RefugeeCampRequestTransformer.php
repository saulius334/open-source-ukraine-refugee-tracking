<?php

declare(strict_types=1);

namespace App\Services\RefugeeCamp\Transformers;

use Illuminate\Foundation\Http\FormRequest;

class RefugeeCampRequestTransformer
{
    public function transform(FormRequest $request)
    {
        return [
            'name' => $request->name,
            'originalCapacity' => $request->originalCapacity,
            'currentCapacity' => $request->originalCapacity,
            'rooms' => $request->rooms,
            'volunteers' => $request->volunteers,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
        ];
    }
}