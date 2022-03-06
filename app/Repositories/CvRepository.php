<?php

namespace App\Repositories;

use App\Models\Cv;
use App\Models\JobExperience;
use App\Models\JobExperienceRoles;
use App\Models\NyscDetails;
use App\Models\Qualifications;
use App\Models\Referees;
use App\Models\SecondaryEducation;
use App\Models\TertiaryEducation;
use Illuminate\Http\Request;

class CvRepository
{
    public function handle_create_cv(Request $request)
    {   
        $cv = new Cv();

        return $this->handle_update_cv($request, $cv);
       
    }

    public function handle_update_cv(Request $request, Cv $cv)
    {   
        $cv->first_name = $request['first_name'];
        $cv->middle_name = $request['middle_name'];
        $cv->last_name = $request['last_name'];
        $cv->dob = $request['dob'];
        $cv->sex = $request['sex'];
        $cv->town = $request['town'];
        $cv->street = $request['street'];
        $cv->mobile_phone = $request['mobile_phone'];
        $cv->home_phone = $request['home_phone'];
        $cv->email = $request['email'];
        $cv->preferred_employment_industry = $request['preferred_employment_industry'];
        $cv->hobbies = $request['hobbies'];
        $cv->additional_information = $request['additional_information'];
        $cv->no_of_secondary_school = $request['no_of_secondary_school'];
        $cv->preferred_employment_city = $request['preferred_employment_city'];
        $cv->country_id = $request['country_id'];
        $cv->state_id = $request['state_id'];
        $cv->city_id = $request['city_id'];
        $cv->user_id = auth()->user()->id;
        return $cv->save();
    }

    public function handle_update_secondary_education(Request $request, Cv $cv, $secondary_education_id = null)
    {   
        $secondary_education = SecondaryEducation::updateOrCreate(
            [
                'id' => $secondary_education_id,
                'cv_id' => $cv->id,
            ],
            [
                'name' => $request['name'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'qualification' => $request['qualification'],
                'status' => $request['status'],
                'cv_id' => $cv['id'],
            ]
        );

        return $secondary_education;
    }

    public function handle_update_tertiary_education(Request $request, Cv $cv, $tertiary_education_id = null)
    {   
        $tertiary_education = TertiaryEducation::updateOrCreate(
            [
                'id' => $tertiary_education_id,
                'cv_id' => $cv->id,
            ],
            [
                'name' => $request['name'],
                'type' => $request['type'],
                'other_type' => $request['other_type'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'qualification' => $request['qualification'],
                'professional_qualification' => $request['professional_qualification'],
                'cv_id' => $cv['id'],
            ]
        );

        return $tertiary_education;
    }

    public function handle_update_qualification(Request $request, Cv $cv, $qualification_id = null)
    {   
        $qualification = Qualifications::updateOrCreate(
            [
                'id' => $qualification_id,
                'cv_id' => $cv->id,
            ],
            [
                'title' => $request['title'],
                'type' => $request['type'],
                'other_type' => $request['other_type'],
                'date' => $request['date'],
                'institution' => $request['institution'],
                'completed_nysc' => $request['completed_nysc'],
                'cv_id' => $cv['id'],
            ]
        );

        return $qualification;
    }

    public function handle_update_nysc_detail(Request $request, Cv $cv, $nysc_detail_id = null)
    {   
        $nysc_detail = NyscDetails::updateOrCreate(
            [
                'id' => $nysc_detail_id,
                'cv_id' => $cv->id,
            ],
            [
                'state_id' => $request['state_id'],
                'other_type' => $request['other_type'],
                'ref_for_location' => $request['ref_for_location'],
                'employed' => $request['employed'],
                'cv_id' => $cv['id'],
            ]
        );

        return $nysc_detail;
    }

    public function handle_update_job_experience(Request $request, Cv $cv, $job_experience_id = null)
    {   
        $job_experience = JobExperience::updateOrCreate(
            [
                'id' => $job_experience_id,
                'cv_id' => $cv->id,
            ],
            [
                'employer' => $request['employer'],
                'industry' => $request['industry'],
                'other_industry' => $request['other_industry'],
                'employment_date' => $request['employment_date'],
                'role' => $request['role'],
                'job_description' => $request['job_description'],
                'no_of_positions' => $request['no_of_positions'],
                'cv_id' => $cv['id'],
            ]
        );

        return $job_experience;
    }

    public function handle_update_job_experience_role(Request $request, JobExperience $job_experience, $job_experience_role_id = null)
    {   
        $job_experience_role = JobExperienceRoles::updateOrCreate(
            [
                'id' => $job_experience_role_id,
                'job_experience_id' => $job_experience['id'],
            ],
            [
                'position' => $request['position'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'job_description' => $request['job_description'],
                'no_of_positions' => $request['no_of_positions'],
                'referees' => $request['referees'],
                'job_experience_id' => $job_experience['id'],
            ]
        );

        return $job_experience_role;
    }

    public function handle_update_referee(Request $request, Cv $cv, $referee_id = null)
    {   
        $referee = Referees::updateOrCreate(
            [
                'id' => $referee_id,
                'cv_id' => $cv->id,
            ],
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'for_industry_type' => $request['for_industry_type'],
                'cv_id' => $cv['id'],
            ]
        );

        return $referee;
    }
}