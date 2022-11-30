<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRefugeeRequest extends FormRequest
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
            'surname' => 'required|min:2|max:30',
            'IdNumber' => 'required|numeric|digits:10',
            Rule::unique('refugees', 'IdNumber')->ignore($this->refugee->IdNumber),
            'bedsTaken' => 'required|min:0',
            'current_refugee_camp_id' => 'required',
            // [

            // ]
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Please add name.',
                'surname.required' => 'Please add surname.',
                'IdNumber.required' => 'Please enter valid Ukrainian ID number',
                'IdNumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
                'bedsTaken' => 'Please specify how many beds will you take.'
        ];
    }
}
