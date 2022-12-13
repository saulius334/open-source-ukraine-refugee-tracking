<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRefugeeCampRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:30',
            'originalCapacity' => 'required|numeric|min:1|max:10000',
            'rooms' => '',
            'volunteers' => '',
        ];
    }
    public function messages(): array
    {
        return [
                'name.required' => 'Please add a name of the camp.',
                'capacity.required' => 'Please enter how many people you can take in.',
        ];
    }
}
