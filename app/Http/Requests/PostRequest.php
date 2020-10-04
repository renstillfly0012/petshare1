<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $redirectRoute ;

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
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],   
        ];

        
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
         

            // dd($validator->messages()->all()[0])->withInput();
            // die(var_dump($validator->errors()));
            // return back()->with('error', $validator->messages()->all())->withInput();
            return redirect()->route('incident');
        } else {
            die('Passed');
        }
    }

    // public function attributes(){
    //     return [
    //         'name' => 'user_name',
    //         'email' => 'user_email',
    //         'password' => 'user_password',
    //     ];
    // }
}
