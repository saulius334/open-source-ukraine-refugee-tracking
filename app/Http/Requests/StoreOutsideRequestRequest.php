<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\ImageServices\ImagePathService;

class StoreOutsideRequestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'surname' => 'required|min:2|max:30',
            'IdNumber' => 'required|min:10|max:10|unique:refugees,IdNumber',
            'bedsTaken' => 'required',
            'current_refugee_camp_id' => 'required',
            'photo' => 'sometimes|required|mimes:jpg|max:3000',
            'pets' => '',
            'destination' => '',
            'aidReceived' => '',
            'healthCondition' => '',


        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please add your name.',
            'surname.required' => 'Please add your surname.',
            'IdNumber.required' => 'Please enter valid Ukrainian ID number',
            'IdNumber.unique' => 'This ID number is already register. Check in with the camp you registered in.',
            'bedsTaken' => 'Please specify how many beds will you take.',
            'photo.max' => 'file exceeds 3MB'
        ];
    }
    // public function prepareForValidation()
    // {
    //     $imagePathService = new ImagePathService();
    //     $imagePath = $imagePathService->storeImageAndGetPath($this->photo);

    //     $this->merge([
    //         'photo' => $imagePath
    //     ]);
    //     dd($this->photo);
    // }
}
