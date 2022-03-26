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
            'type_of_institution'             => 'nullable|string',
            'other_tertiary_institution_type' => 'required_if:type_of_institution,others',
            'name_of_institution'             => 'nullable|string',
            'other_tertiary_institution'      => 'required_if:name_of_institution,others',
            'qualification'                   => 'nullable|string',
            'other_qualifiation_obtained'     => 'required_if:qualification,others',
            'course_type'                     => 'nullable|string',
            'other_course_type'               => 'required_if:course_type,others',
            'course'                          => 'nullable|string',
            'other_course'                    => 'required_if:course,others',
            'grade'                           => 'nullable|string',
            'other_grade'                     => 'required_if:grade,others',
            'start_date'                      => 'required|date|before:end_date',
            'end_date'                        => 'nullable|date|after:start_date',
        ];

    }
}
