<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.email_required'),
            'email.email' => trans('validation.email'),
            'email.max' => trans('validation.email_max'),
            'password.required' => trans('validation.password_required'),
            'password_max' => trans('validation.password_max')
        ];
    }
}
