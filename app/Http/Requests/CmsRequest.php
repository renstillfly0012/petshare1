<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsRequest extends FormRequest
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
            'edit_content_section' => 'required', 'string', 'max:255',
            'edit_content_title' => 'required', 'string', 'max:255',
            'edit_content_description' => 'required', 'string', 'max:255',
            'edit_image' => 'mimes:jpeg,jpg,png,gif','image', 'max:25000',
        ];
    }
}
