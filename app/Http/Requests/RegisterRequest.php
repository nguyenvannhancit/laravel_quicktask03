<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize ()
    {
        return true;
    }

    public function rules ()
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|regex:/^[a-zA-Z0-9!$#%]+$/',
            'repassword' => 'required|same:password',
            'email' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',
        ];
    }

    public function messages ()
    {
        return [
            'name.required' => 'Please Enter Name',
            'username.required' => 'Please Enter UserName',
            'username.unique' => 'UserName is Exist',
            'password.required' => 'Please Enter PassWord',
            'repassword.required' => 'Please Enter Re-PassWord',
            'email.required' => 'Please Enter Email',
        ];
    }
}
