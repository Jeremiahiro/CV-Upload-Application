<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobExperienceResource extends JsonResource
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
            'employer' => $this->employer,
            'industry' => $this->industry,
            'other_industry' => $this->other_industry,
            'employment_date' => $this->employment_date,
            'role' => $this->role,
            'job_description' => $this->job_description,
            'no_of_positions' => $this->no_of_positions,
            'other_roles' => JobRolesResource::collection($this->roles),
        ];
    }
}
