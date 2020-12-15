<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Recaptcha;

class adoptRequest extends FormRequest
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
            'show_requested_date' => 'required|date',
            'g-recaptcha-response' => 'required', new Recaptcha()
 
        ];
    }

    public function messages(){
        return[
            'g-recaptcha-response.required' => 'Captcha Required: Please check the box to confirm you are a real person.',
        ];
    }
}
