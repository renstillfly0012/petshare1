<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class adoptPostRequest extends FormRequest
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
            'show_user_id' => ['required', 'integer', 'max:255'],
            'show_pet_id' => ['required', 'integer', 'max:255'],
            'show_requested_date' => 'required',
        ];
    }

    public function withValidator($validator)
    {
         if ($validator->fails()) {
         
        return $validator->messages()->all();
        } 
    }
}
