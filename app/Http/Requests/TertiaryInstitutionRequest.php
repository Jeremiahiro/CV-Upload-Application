<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TertiaryInstitutionRequest extends FormRequest
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
            'professional_qualification' => 'nullable|string',
            'name_of_institution' => 'required|string',
            'type_of_institution' => 'required|string',
            'other_tertiary_institution_type' => 'required_if:type_of_institution,others',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'nullable|date|after:start_date',
        ];

    }
}
