<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class surrenderPostRequest extends FormRequest
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
            'name' => 'required',
            'message' => 'required',
            'requested_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
        ];
    }

    public function messages(){
        return[
          'image' => 'Try again, please select a valid image. ',
        ];
    }
}
