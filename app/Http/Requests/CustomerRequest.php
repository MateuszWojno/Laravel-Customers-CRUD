<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
{
    public function rules()
    {
        if ($this->getMethod() === 'POST') {
            $rules = [
                'first_name'   => 'required|min:3|max:20|regex:/^[a-zA-z]+$/u',
                'last_name'    => 'required|min:3|max:30|regex:/^[a-zA-z]+$/u',
                'email'        => 'required|email|unique:customers,email',
                'phone_number' => 'min:9|max:9|unique:customers,phone_number'
            ];
        }

        if ($this->getMethod() === 'PUT') {
            $rules = [
                'first_name'   => 'min:3|max:20|regex:/^[a-zA-z-0-9]+$/u',
                'last_name'    => 'min:3|max:30|regex:/^[a-zA-z-0-9]+$/u',
                'email'        => ['email', Rule::unique('customers')->ignore($this->customer)],
                'phone_number' => ['digits:9', Rule::unique('customers')->ignore($this->customer)]
            ];
        }

        return $rules;
    }
}
