<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'required|email',
            'name'      => 'required|string|max:255',
            'subject'   => 'required|string|max:255',
            'message'   => 'nullable|string',
            'client_id' => 'nullable|integer'
        ];
    }

    public function attributes()
    {
        return [
            'email'   => __('Email'),
            'name'    => __('Name'),
            'subject' => __('Subject'),
            'message' => __('Message'),
        ];
    }

    public function messages()
    {
        return [
            'email.required'   => __('Email is required.'),
            'email.email'      => __('Please enter a valid email.'),
            'name.required'    => __('Name is required.'),
            'subject.required' => __('Subject is required.'),
        ];
    }
}
