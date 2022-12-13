<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRefugeeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'bedsTaken' => 'required|min:0',
            'current_refugee_camp_id' => 'required',
            'confirmed' => '',
            'photo' => 'sometimes|required|mimes:jpg,png|max:2048',
            'pets' => '',
            'destination' => '',
            'aidReceived' => '',
            'healthCondition' => '',
        ];
    }
    public function messages(): array
    {
        return [
                'name.required' => 'Please add name.',
                'surname.required' => 'Please add surname.',
                'bedsTaken' => 'Please specify how many beds will you take.',
                'current_refugee_camp_id.required' => 'Please select your camp',
        ];
    }
    public function prepareForValidation(): void
    {
        $this->merge([
            'confirmed' => 1
        ]);
    }
}
