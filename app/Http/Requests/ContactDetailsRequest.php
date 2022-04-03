<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactDetailsRequest extends FormRequest
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
            'town' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'mobile_phone' => 'nullable|regex:/^\+(?:[0-9]?){6,14}[0-9]{10}$/',
            'home_phone' => 'required_if:mobile_phone,null|nullable|regex:/^\+(?:[0-9]?){6,14}[0-9]{10}$/',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'mobile_phone' => 'Mobile phone number is requird and must be valid',
            'home_phone' => 'Home phone number is requird when mobile phone number is empty and must be valid',
        ];
    }
}
