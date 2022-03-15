<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nysc_state' => 'required|string',
            'comencement_date' => 'required|date',
            'location_preference' => 'required|string',
            'employment_status' => 'required|string',
        ];
    }
}
