<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'edit_user_name' => 'required', 'string', 'max:255',
            'edit_email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'edit_password' => 'required', 'string', 'min:8', 'confirmed',
            // 'edit_image' => 'mimes:jpeg,jpg,png,gif','image', 'max:25000',
        ];
    }

    public function attributes(){
        return [
            'name' => 'edit_user_name',
            'email' => 'edit_email',
            'password' => 'edit_password',
            'image' => 'edit_image',
        ];
    }

    
}
