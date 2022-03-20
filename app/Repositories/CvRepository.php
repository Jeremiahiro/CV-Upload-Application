<?php

namespace App\Repositories;

use App\Enums\CvStatus;
use App\Http\Resources\CVResource;
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

    public function handle_get_data(Request $request)
    {
        $cv = Cv::where('status', CvStatus::active())->where('user_id', auth()->user()->id);
        return new CVResource($cv);
    }
    
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
        $cv->dob = $request['date_of_birth'];
        $cv->sex = $request['sex'];
        $cv->user_id = auth()->user()->id;
        $cv->save();
        return $cv;
    }

    public function handle_update_contact_details(Request $request, Cv $cv)
    {   
        $cv->town = $request['town'];
        $cv->country_id = $request['country'];
        $cv->state_id = $request['state'];
        $cv->street = $request['street'];
        $cv->mobile_phone = $request['mobile_phone'] ?? '';
        $cv->home_phone = $request['home_phone'] ?? '';
        $cv->email = $request['email'];
        $cv->save();
        return $cv;
    }

    public function handle_create_secondary_education(Request $request, Cv $cv)
    {   
        $secondary_education = new SecondaryEducation();
        return $this->handle_update_secondary_education($request, $cv, $secondary_education);
    }

    public function handle_update_secondary_education(Request $request, Cv $cv, SecondaryEducation $secondary_education)
    {   
        $secondary_education->name = $request['name'];
        $secondary_education->start_date = $request['start_date'];
        $secondary_education->end_date = $request['end_date'];
        $secondary_education->secondary_qualifications_id = $request['qualification'];
        $secondary_education->cv_id = $cv['id'];

        $cv->update([
            'tertiary_institution' => $request['tertiary_institution'] ?: $cv->tertiary_institution,
            'no_of_secondary_school' => $request['no_of_secondary_school'] ?: $cv->no_of_secondary_school
        ]);

        return $secondary_education->save();
    }

    public function handle_create_tertiary_education(Request $request, Cv $cv)
    {   
        $tertiary_education = new TertiaryEducation();
        return $this->handle_update_tertiary_education($request, $cv, $tertiary_education);
    }

    public function handle_update_tertiary_education(Request $request, Cv $cv, TertiaryEducation $tertiary_education)
    {   
        if($request['type_of_institution'] === 'others') {
            $tertiary_education->other_type = $request['other_tertiary_institution_type'];
        } else {
            $tertiary_education->tertiary_types_id = $request['type_of_institution'];
        }
        $tertiary_education->tertiary_institutions_id = $request['name_of_institution'];
        $tertiary_education->start_date = $request['start_date'];
        $tertiary_education->end_date = $request['end_date'];
        $tertiary_education->tertiary_qualifications_id = $request['qualification'];
        $tertiary_education->cv_id = $cv['id'];

        $cv->update([
            'professional_qualification' => $request['professional_qualification'] ?: $cv->professional_qualification,
        ]);

        return $tertiary_education->save();
    }

    public function handle_create_professional_qualification(Request $request, Cv $cv)
    {   
        $qualification = new Qualifications();
        return $this->handle_update_professional_qualification($request, $cv, $qualification);
    }
    
    public function handle_update_professional_qualification(Request $request, Cv $cv, Qualifications $qualification)
    {   

        if($request['type_of_qualification'] === 'others') {
            $qualification->other_qualification_type = $request['other_qualification_type'];
        } else {
            $qualification->professional_qualifications_id = $request['type_of_qualification'];
        }

        if($request['awarding_institution'] === 'others') {
            $qualification->other_institutions_type = $request['other_awarding_institution'];
        } else {
            $qualification->professional_institutions_id = $request['awarding_institution'];
        }

        $qualification->name = $request['name_of_qualification'];
        $qualification->date = $request['qualification_date'];
        $qualification->cv_id = $cv['id'];

        $cv->update([
            'completed_nysc' => $request['nysc_check'] ?: $cv->completed_nysc,
        ]);

        return $qualification->save();
    }


    public function handle_update_nysc_details(Request $request, Cv $cv)
    {   
        $nysc_detail = NyscDetails::where('cv_id', $cv['id'])->first() ?? new NyscDetails();

        $nysc_detail->state_id = $request['nysc_state'];
        $nysc_detail->date = $request['comencement_date'];
        $nysc_detail->cv_id = $cv['id'];

        $cv->update([
            'location_preference' => $request['location_preference'] ?: $cv->location_preference,
            'employment_status' => $request['employment_status'] ?: $cv->employment_status
        ]);

        return $nysc_detail->save();
    }

    public function handle_create_job_experience(Request $request, Cv $cv)
    {   
        $experience = new JobExperience();
        return $this->handle_update_job_experience($request, $cv, $experience);
    }

    public function handle_update_job_experience(Request $request, Cv $cv, JobExperience $experience)
    {   

        if($request['industry_sector'] === 'others') {
            $experience->other_industry = $request['other_industry_sector'];
        } else {
            $experience->industrial_sectors_id = $request['industry_sector'];
        }

        $experience->employer = $request['name_of_employer'];
        $experience->date = $request['employment_date'];
        $experience->role = $request['role'];
        $experience->job_description = $request['job_description'];
        $experience->no_of_positions = $request['no_of_positions'];
        $experience->is_current = $request['is_current'] == 'current' ? true : false;
        $experience->cv_id = $cv['id'];
        $experience->save();

        return $experience;
    }

    public function handle_create_referee(Request $request, Cv $cv)
    {   
        $referee = new Referees();
        return $this->handle_update_referee($request, $cv, $referee);
    }

    public function handle_update_referee(Request $request, Cv $cv, Referees $referee)
    {   
        $referee->name = $request['referee_name'];
        $referee->email = $request['referee_email'];
        $referee->phone = $request['referee_phone_number'];
        $referee->address = $request['referee_address'];
        $referee->for_industry_type = $request['for_industry_type'];
        $referee->name = $request['referee_name'];
        $referee->cv_id = $cv['id'];

        return $referee->save();
    }

    public function handle_create_employement_role(Request $request, JobExperience $experience,)
    {   
        $role = new JobExperienceRoles();
        return $this->handle_update_employement_role($request, $experience, $role);
    }

    public function handle_update_employement_role(Request $request, JobExperience $experience, JobExperienceRoles $role)
    {   

        $role->position = $request['position'];
        $role->start_date = $request['from_date'];
        $role->end_date = $request['to_date'];
        $role->job_description = $request['job_description'];
        $role->referees = $request['referees'];
        $role->job_experience_id = $experience['id'];

        return $role->save();
    }

    public function handle_update_location_preference(Request $request, Cv $cv)
    {   
        return $cv->update([
            'preferred_state_id' => $request['preferred_state'] ?: $cv->preferred_state,
            'preferred_industry_id' => $request['preferred_industry'] ?: $cv->preferred_industry,
            'has_hobbies' => $request['hobbies'] ?: $cv->hobbies,
        ]);
    }

    public function handle_update_hobbies(Request $request, Cv $cv)
    {   
        return $cv->update([
            'hobbies' => json_encode($request['hobbies']) ?? '',
            'additional_information' => $request['additional_information'] ?: $cv->additional_information,
        ]);
    }

    
}