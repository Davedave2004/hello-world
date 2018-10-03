<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FileRequest extends FormRequest
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
     * 'picture_file'       =>'required','image','mimes:jpg,png,jpeg,gif','max:2048',''
     * @return array
     */
    public function rules()
    {
        return [
            'account'           => ['required', Rule::in(['rfm', 'jsu', 'pascual', 'nokia', 'splash'])],
            'lastname'          => ['required', 'max:255'],
            'firstname'         => ['required', 'max:255'],
            'middlename'        => ['nullable', 'max:255'],
            'suffix'            => ['nullable', 'max:255'],
            'contactno'         => ['required', 'regex:/^09\d{9}$/'],
            'age'               => ['required', 'numeric', 'max:120'],
            'birthday'          => ['required', 'before:-1 day'], //before present lang? age requirement?
            'gender'            => ['required', Rule::in('Male','Female')],
            'address'           => ['required', 'max:255'],
            'emergencycontact'  => ['required', 'regex:/^09\d{9}$/'],
            'datehired'         => ['required', 'before:now'], //before present lang?
            'area'              => ['required', 'alpha_dash', 'max:255'],
            'position'          => ['required', 'alpha_dash', 'max:255'],

            //may format ba tong tatlong to ?
            'sss'               => ['nullable','numeric'], 
            'pagibig'           => ['nullable','numeric'],
            'philhealth'        => ['nullable','numeric'],
        ];
    }

    //Kung gusto mo baguhin yung default messages
    //FORMAT: field.rulename => "message" 
    public function messages() {
        return [
            'contactno.regex' => "Contact numbers must be a valid mobile number",
            'emergencycontact.regex' => "Emergency contact numbers must be a valid mobile number",
            'birthday.before' => "Birthday must be a date before today."
        ];
    }
}
