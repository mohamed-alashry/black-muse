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
            'email'   => __('site.email'),
            'name'    => __('site.name'),
            'subject' => __('site.subject'),
            'message' => __('site.message'),
        ];
    }

    public function messages()
    {
        return [
            'email.required'   => __('site.Email is required.'),
            'email.email'      => __('site.Please enter a valid email.'),
            'name.required'    => __('site.Name is required.'),
            'subject.required' => __('site.Subject is required.'),
        ];
    }
}
