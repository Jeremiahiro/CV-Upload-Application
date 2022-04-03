<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationPreferenceRequest extends FormRequest
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
            'most_preferred_country'            => ['required', 'string', Rule::exists('countries', 'id')],
            'most_preferred_state'              => ['required', 'string', Rule::exists('states', 'id')],
            'most_preferred_industry'           => ['required', 'string'],
            'other_preferred_industry_first'    => 'required_if:most_preferred_industry,others',

            'preferred_country'                 => ['required', 'string', Rule::exists('countries', 'id')],
            'preferred_state'                   => ['required', 'string', Rule::exists('states', 'id')],
            'preferred_industry'                => ['required', 'string'],
            'other_preferred_industry_second'   => 'required_if:preferred_industry,others',

            'hobbies'                           => 'required|string',

        ];
    }
}
