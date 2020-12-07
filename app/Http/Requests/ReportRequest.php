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
            'user_id' => 'numeric',
            'name' => 'regex:/^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/',
            'address' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif', 'max:25000',
            'address_lat' => 'required','double',
            'address_lng' => 'required','double',
            'email' => 'required', 'string', 'email', 'max:255',
            'mobile_number' => ['required','regex:/^(09|\+639)\d{9}$/'],
            'report_type' => 'required',
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
          'address_lat' => 'Zero results on Google maps please refresh and try again.',
          'address_lng' => 'Zero results on Google maps please refresh and try again.',
        ];
    }
}
