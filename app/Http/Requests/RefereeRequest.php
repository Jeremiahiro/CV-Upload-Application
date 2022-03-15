<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'referee_phone_number' => 'required|string',
            'referee_address' => 'required|string',
            'for_industry_type' => 'required|string',
        ];
    }
}
