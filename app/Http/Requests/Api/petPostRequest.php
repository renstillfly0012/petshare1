<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class petPostRequest extends FormRequest
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
                // 'name' => 'required', 'string', 'max:255',
                'age' => 'required', 'integer', 'max:20', 'min:0',
                 'breed' => 'required', 'string', 'max: 20',
                 'description' => 'required', 'string', 'max:255',
                //  'image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
            
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
         
            return $validator->messages()->all();
        } 
    }
}
