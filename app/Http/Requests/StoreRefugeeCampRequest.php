<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRefugeeCampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'capacity' => 'required|numeric|min:1|max:10000',
            // [
            //     'name.required' => 'Please add a name of the camp.',
            //     'capacity.required' => 'Please enter how many people you can take in.',
            // ]
        ];
    }
}
