<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRefugeeCampRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'originalCapacity' => 'required|numeric|min:1|max:10000',
            'currentCapacity' => '',
            'rooms' => '',
            'volunteers' => '',
            // [
            //     'name.required' => 'Please add a name of the camp.',
            //     'capacity.required' => 'Please enter how many people you can take in.',
            // ]
        ];
    }
}
