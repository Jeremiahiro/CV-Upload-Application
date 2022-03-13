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
            'mobile_phone' => 'nullable|string',
            'home_phone' => 'nullable|string',
            'email' => 'required|email',
        ];
    }
}
