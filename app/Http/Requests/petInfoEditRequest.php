<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class petInfoEditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'pet_owner_id' => 'required',
            'pet_allergies' => 'required','string', 'max:255',
            'pet_existing_conditions' => 'required','string', 'max:255',
        ];
    }

    public function messages(){
        return [
            'pet_owner_id.required' => 'Pet Owner Field: Please do not leave it blank instead select None, thank you!',
            'pet_allergies.required' => 'Allergies Field:  Please do not leave it blank instead write None, thank you!',
            'pet_existing_conditions.required' =>  'Existing Conditions Field:  Please do not leave it blank instead write None, thank you!',
        ];

    }
}
