<?php

namespace App\Http\Requests;

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
            'image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
            'address_lat' => 'required','double',
            'address_lng' => 'required','double',
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
        //    dd('passed');
        }
    }

    public function messages(){
        return[
          
        ];
    }
}
