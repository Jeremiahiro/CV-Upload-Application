<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalQualificationsRequest extends FormRequest
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
            'name_of_qualification' => 'required|string',
            'type_of_qualification' => 'required|string',
            'other_qualification_type' => 'required_if:type_of_qualification,others',
            'qualification_date' => 'required|date',
            'awarding_institution' => 'required|string',
            'other_awarding_institution' => 'required_if:awarding_institution,others',
            'nysc_check' => 'nullable|string',
        ];
    }
}
