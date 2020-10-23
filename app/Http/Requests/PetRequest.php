<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'pet_name' => 'required', 'string', 'max:255',
            'pet_age' => 'required', 'integer', 'max:20', 'min:0',
             'pet_breed' => 'required', 'string', 'max: 20',
             'pet_description' => 'required', 'string', 'max:255',
             'pet_image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
        ];
        
    }

    public function attributes(){
        return [
            'name' => 'pet_name',
            'age' => 'pet_age',
            'breed' => 'pet_breed',
            'description' => 'pet_description',
            'image' => 'pet_image',
        ];
    }
}
