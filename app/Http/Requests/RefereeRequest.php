<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RefereeRequest extends FormRequest
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
            'referee_name' => 'required|string',
            'referee_email' => 'required|email',
            'referee_phone_number' => 'nullable|regex:/^\+(?:[0-9]?){6,14}[0-9]{10}$/',
            'referee_address' => 'required|string',
            'has_prefered_location' => 'required|string',
            'referee_country' => ['required', 'string', Rule::exists('countries', 'id')],
            'referee_state' => ['required', 'string', Rule::exists('states', 'id')],
        ];
    }
}
