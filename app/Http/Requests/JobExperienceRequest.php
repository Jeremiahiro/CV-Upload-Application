<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobExperienceRequest extends FormRequest
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
            'name_of_employer'          => 'required|string',
            'industry_sector'           => 'required|string',
            'other_industry_sector'     => 'required_if:industry_sector,others',
            'employment_date'           => 'required|date',
            'role'                      => 'required|string',
            'other_employment_role'    => 'required_if:role,others',
            'job_description'           => 'required|string',
            'have_prior_role'           => 'required|string',
            'no_of_positions'           => 'required_if:have_prior_role,1|string',
        ];
    }
}
