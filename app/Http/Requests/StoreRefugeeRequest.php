<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\Refugee\ConfirmedCheckService;

class StoreRefugeeRequest extends FormRequest
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
                'IdNumber' => 'required|numeric|digits:10|unique:refugees,IdNumber',
                'bedsTaken' => 'required|min:0',
                'confirmed' => 'boolean',
                'current_refugee_camp_id' => 'required',
                'photo' => 'sometimes|image|mimes:jpg,png|max:2048',
                'pets' => 'sometimes',
                'destination' => 'sometimes',
                'aidReceived' => 'sometimes',
                'healthCondition' => 'sometimes',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'IdNumber.required' => 'Please enter valid Ukrainian ID number',
            'IdNumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
            'bedsTaken' => 'Please specify how many beds will you take.',
            'photo.max' => 'file exceeds 2MB'
        ];
    }
    public function prepareForValidation(): void
    {
        $checkIfConfirmedService = new ConfirmedCheckService();
        $this->merge([
            'confirmed' =>
                $checkIfConfirmedService->checkIfConfirmed($this->current_refugee_camp_id, Auth::user()?->id),
        ]);
    }
}
