<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CVResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'basic' => [
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'dob' => $this->dob,
                'sex' => $this->sex,
                'town' => $this->town,
                'street' => $this->street,
                'mobile_phone' => $this->mobile_phone,
                'home_phone' => $this->home_phone,
                'email' => $this->email,
                'preferred_employment_industry' => $this->preferred_employment_industry,
                'hobbies' => $this->hobbies,
                'additional_information' => $this->additional_information,
                'no_of_secondary_school' => $this->no_of_secondary_school,
                'preferred_employment_city' => $this->preferred_employment_city,
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
            ],
            'secondary_educations' => SecondaryEducationResource::collection($this->secondary_educations),
            'tertiary_educations' => TertiaryEducationResource::collection($this->tertiary_educations),
            'qualifications' => QualificationResource::collection($this->qualifications),
            'nysc_details' => new NyscResource($this->nysc_details),
            'job_experiences' => JobExperienceResource::collection($this->job_experiences),
            'referees' => RefereeResource::collection($this->referees),
        ];
        return parent::toArray($request);
    }
}
