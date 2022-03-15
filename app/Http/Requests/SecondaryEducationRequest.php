<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecondaryEducationRequest extends FormRequest
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
            'no_of_secondary_school' => 'nullable|string',
            'name' => 'required|string',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'nullable|date|after:start_date',
            'qualification' => 'required|string',
            'tertiary_institution' => 'required|string',
            'has_more' => 'nullable|string',
        ];
    }
}