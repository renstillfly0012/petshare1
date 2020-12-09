<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ReportRequest extends FormRequest
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
            'user_id' => 'required','number',
            'address' => 'required',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
            'address_lat' => 'required','double',
            'address_lng' => 'required','double',
            'email' => 'required', 'string', 'email', 'max:255',
            // 'mobile_number' => ['required','regex:/^(09|\+639)\d{9}$/'],
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
         
            return $validator->messages()->all();
        } 
    }
}
