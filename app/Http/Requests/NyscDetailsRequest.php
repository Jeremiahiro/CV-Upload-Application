<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NyscDetailsRequest extends FormRequest
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
            'nysc_country' => ['required', 'string', Rule::exists('countries', 'id')],
            'nysc_state' => ['required', 'string', Rule::exists('states', 'id')],
            'comencement_date' => 'required|date',
            'completion_date' => 'required|date',
            'location_preference' => 'required|string',
            'employment_status' => 'required|string',
        ];
    }
}
