<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobExperiecneRoleRequest extends FormRequest
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
            'role'                          => 'required|string',
            'other_employment_roles'        => 'required_if:role,others',
            'from_date'                     => 'required|date|before:to_date',
            'to_date'                       => 'nullable|date|after:from_date',
            'job_description'               => 'required|string',
            'referees'                      => 'required|string',
        ];
    }
}
