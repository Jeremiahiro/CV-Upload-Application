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
            'other_tertiary_institution' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ];

    }
}
