<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSecondaryEducationRequest extends FormRequest
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
            'no_of_secondary_school'        => 'nullable|string',
            'name'                          => 'required|string',
            'start_date'                    => 'required|date|before:end_date',
            'end_date'                      => 'nullable|date|after:start_date',
            'qualification'                 => 'nullable|string',
            'other_qualifiation_obtained'   => 'required_if:qualification,others',
            'tertiary_institution'          => 'nullable|string',
            'has_more'                      => 'nullable|string',
            'no_of_subjects'                => 'required_unless:qualification,others,none',
            'subject'                       => 'required_unless:qualification,others,none|array',
            'subject.*.subject_id'          => 'nullable', 'distinct', Rule::exists('secondary_subjects', 'id'), 'min:no_of_subjects|max:no_of_subjects',
            'subject.*.grade_id'            => 'nullable', Rule::exists('secondary_grades', 'id'), 'min:no_of_subjects|max:no_of_subjects',
        ];
    }

    public function messages(): array
    {
        return [
            'no_of_subjects' => 'Number of subject is requried',
            'subject' => 'Subject field is requried',
            'subject.*.subject_id' => 'Check for duplicate subject',
        ];
    }
}
