<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name'   => 'required|min:3|max:20|regex:/^[a-zA-z]+$/u',
            'last_name'    => 'required|min:3|max:30|regex:/^[a-zA-z]+$/u',
            'email'        => 'required|email|unique:customers,email',
            'phone_number' => 'min:9|max:9|unique:customers,phone_number'
        ];
    }
}
