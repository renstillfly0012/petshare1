<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class medhisPostRequest extends FormRequest
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
            'pet_info_id' => 'required|numeric',
            'pet_id' => 'required',
            'date' => 'required',
            'description' => 'required', 'string', 'max:255',
            'diagnosis' => 'required', 'string', 'max:255',
            'test_performed' => 'required', 'string', 'max:255',
            'test_results' => 'required', 'string', 'max:255',
            'action' => 'required', 'string', 'max:255',
            'medications' => 'required', 'string', 'max:255',
            'comments' => 'required', 'string', 'max:255',
        ];
    }
}
