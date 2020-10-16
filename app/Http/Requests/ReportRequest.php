<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'image' => 'required','mimes:jpeg,jpg,png,gif','image', 'max:25000',
            'address_lat' => 'required','double',
            'address_lng' => 'required','double',
        ];
    }

    public function messages(){
        return[
          
        ];
    }
}
