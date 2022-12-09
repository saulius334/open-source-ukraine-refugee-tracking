<?php

declare(strict_types=1);

namespace App\Services\Shared\Transformers\Request;

use Illuminate\Foundation\Http\FormRequest;

class RefugeeRequestTransformer
{
    public function transform(FormRequest $request)
    {
        return [
            'name' => $request->name,
            'surname' => $request->surname,
            'IdNumber' => $request->IdNumber,
            'bedsTaken' => $request->bedsTaken,
            'confirmed' => $request->confirmed,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
            'photo' => $request->photo,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition 
        ];
    }
}