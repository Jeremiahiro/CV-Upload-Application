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
use App\Models\SecondaryEducationQualifications;
use App\Models\TertiaryEducation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isTrue;

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
        return $this->handle_update_secondary_education($request, $cv, $secondary_education, true);
    }

    public function handle_update_secondary_education(Request $request, Cv $cv, SecondaryEducation $secondary_education, $new = false): bool
    {  
        try {
            DB::beginTransaction();
            $secondary_education->name = $request['name'] ?: $secondary_education->name;
            $secondary_education->no_of_subjects = $request['no_of_subjects'] ?: $secondary_education->no_of_subjects;

            $start_date = Carbon::parse($request['start_date'])->format('M-Y');
            $end_date = Carbon::parse($request['end_date'])->format('M-Y');

            $secondary_education->start_date = Carbon::createFromFormat('M-Y', $start_date);
            $secondary_education->end_date = Carbon::createFromFormat('M-Y', $end_date);
    
            // TODO: update this session
            switch ($request['qualification']) {
                case 'others':
                    $secondary_education->other_qualification = $request['other_qualifiation_obtained'];
                    break;
                case 'none':
                    //
                    break;
                
                default:
                    $secondary_education->secondary_qualifications_id = $request['qualification'];
                    break;
            }

            // if($request['qualification'] === 'others') {
            //     $secondary_education->other_qualification = $request['other_qualifiation_obtained'];
            // } else {
            //     $secondary_education->secondary_qualifications_id = $request['qualification'];
            // }

            $secondary_education->cv_id = $cv['id'];
            $secondary_education->save();
    
            if($request->subject){
                $secondary_education->qualifications()->delete();
                foreach($request->subject as $subject) {
                    $qualification = new SecondaryEducationQualifications();
                    $qualification->secondary_subject = $subject['subject_id'];
                    $qualification->secondary_grades = $subject['grade_id'];
                    $qualification->secondary_education = $secondary_education->id;
                    $qualification->save();
                }
            }

            if($new) {
                $cv->update([
                    'tertiary_institution' => $request['tertiary_institution'] ?: $cv->tertiary_institution,
                    'no_of_secondary_school' => $request['no_of_secondary_school'] ?: $cv->no_of_secondary_school
                ]);
            }

            DB::commit();
    
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return false;
        }
    }

    public function handle_create_tertiary_education(Request $request, Cv $cv)
    {   
        $tertiary_education = new TertiaryEducation();
        return $this->handle_update_tertiary_education($request, $cv, $tertiary_education, true);
    }

    public function handle_update_tertiary_education(Request $request, Cv $cv, TertiaryEducation $tertiary_education, $new = false): bool
    {   
        try {
            if(!$request['name_of_institution'] || $request['name_of_institution'] === 'others') {
                $tertiary_education->other_tertiary_institution = $request['other_tertiary_institution'];
            } else {
                $tertiary_education->tertiary_institutions_id = $request['name_of_institution'];
            }
    
            if(!$request['type_of_institution'] || $request['type_of_institution'] === 'others') {
                $tertiary_education->other_tertiary_type = $request['other_tertiary_institution_type'];
            } else {
                $tertiary_education->tertiary_types_id = $request['type_of_institution'];
            }
    
            if(!$request['qualification'] || $request['qualification'] === 'others') {
                $tertiary_education->other_tertiary_qualification_type = $request['other_qualifiation_obtained'];
            } else {
                $tertiary_education->tertiary_qualification_types_id = $request['qualification'];
            }
    
            if(!$request['grade'] || $request['grade'] === 'others') {
                $tertiary_education->other_tertiary_qualification = $request['other_grade'];
            } else {
                $tertiary_education->tertiary_qualifications_id = $request['grade'];
            }
    
            if(!$request['course_type'] || $request['course_type'] === 'others') {
                $tertiary_education->other_tertiary_course_type = $request['other_course_type'];
            } else {
                $tertiary_education->tertiary_course_types_id = $request['course_type'];
            }
    
            if(!$request['course'] || $request['course'] === 'others') {
                $tertiary_education->other_tertiary_course = $request['other_course'];
            } else {
                $tertiary_education->tertiary_courses_id = $request['course'];
            }
    
            $start_date = Carbon::parse($request['start_date'])->format('M-Y');
            $end_date = Carbon::parse($request['end_date'])->format('M-Y');
    
            $tertiary_education->start_date = Carbon::createFromFormat('M-Y', $start_date);
            $tertiary_education->end_date = Carbon::createFromFormat('M-Y', $end_date);
    
            $tertiary_education->cv_id = $cv['id'];
    
            if($new) {
                $cv->update([
                    'professional_qualification' => $request['professional_qualification'] ?: $cv->professional_qualification,
                ]);
            }
            $tertiary_education->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function handle_create_professional_qualification(Request $request, Cv $cv)
    {   
        $qualification = new Qualifications();
        return $this->handle_update_professional_qualification($request, $cv, $qualification);
    }
    
    public function handle_update_professional_qualification(Request $request, Cv $cv, Qualifications $qualification): bool
    {   
        try {
            DB::beginTransaction();

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
    
            $qualification_date = Carbon::parse($request['qualification_date'])->format('M-Y');
    
            $qualification->date = Carbon::createFromFormat('M-Y', $qualification_date);
            $qualification->cv_id = $cv['id'];
    
            $cv->update([
                'completed_nysc' => $request['nysc_check'] ?: $cv->completed_nysc,
            ]);

            $qualification->save();

            DB::commit();
    
            return true;

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return false;
        }
    }

    public function handle_update_nysc_details(Request $request, Cv $cv)
    {   
        $nysc_detail = NyscDetails::where('cv_id', $cv['id'])->first() ?? new NyscDetails();

        $nysc_detail->country_id = $request['nysc_country'];
        $nysc_detail->state_id = $request['nysc_state'];

        $comencement_date = Carbon::parse($request['comencement_date'])->format('M-Y');
        $completion_date = Carbon::parse($request['completion_date'])->format('M-Y');

        $nysc_detail->comencement_date = Carbon::createFromFormat('M-Y', $comencement_date);
        $nysc_detail->completion_date = Carbon::createFromFormat('M-Y', $completion_date);

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

        try {
            DB::beginTransaction();

            if($request['industry_sector'] === 'others') {
                $experience->other_industry = $request['other_industry_sector'];
            } else {
                $experience->industrial_sectors_id = $request['industry_sector'];
            }

            if($request['role'] === 'others') {
                $experience->other_employment_role = $request['other_employment_role'];
            } else {
                $experience->employment_roles_id = $request['role'];
            }
    
            $experience->employer = $request['name_of_employer'];
    
            $employment_date = Carbon::parse($request['employment_date'])->format('M-Y');
            $experience->date = Carbon::createFromFormat('M-Y', $employment_date);
    
            $experience->have_prior_role = $request['have_prior_role'];
            $experience->job_description = $request['job_description'];
            $experience->no_of_positions = $request['no_of_positions'];
            $experience->is_current = $request['is_current'] == 'current' ? true : false;
            $experience->cv_id = $cv['id'];
            $experience->save();

            DB::commit();

            return $experience;
            
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
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
        $referee->name = $request['referee_name'];
        $referee->country_id = $request['referee_country'];
        $referee->state_id = $request['referee_state'];
        $referee->cv_id = $cv['id'];

        $cv->update([
            'has_prefered_location' => $request['has_prefered_location'] ?: $cv->has_prefered_location,
        ]);

        return $referee->save();
    }

    public function handle_create_employment_role(Request $request, JobExperience $experience,)
    {   
        $role = new JobExperienceRoles();
        return $this->handle_update_employment_role($request, $experience, $role);
    }

    public function handle_update_employment_role(Request $request, JobExperience $experience, JobExperienceRoles $role)
    {   
        if($request['role'] === 'others') {
            $role->other_employment_role = $request['other_employment_role'];
        } else {
            $role->employment_roles_id = $request['role'];
        }

        $start_date = Carbon::parse($request['from_date'])->format('M-Y');
        $end_date = Carbon::parse($request['to_date'])->format('M-Y');

        $role->start_date = Carbon::createFromFormat('M-Y', $start_date);
        $role->end_date = Carbon::createFromFormat('M-Y', $end_date);

        $role->job_description = $request['job_description'];
        $role->referees = $request['referees'];
        $role->job_experience_id = $experience['id'];

        return $role->save();
    }

    public function handle_update_location_preference(Request $request, Cv $cv)
    {   
        if($request['most_preferred_industry'] === 'others') {
            $cv->other_most_preferred_industry = $request['other_preferred_industry_first'];
        } else {
            $cv->most_preferred_industry_id = $request['most_preferred_industry'];
        }

        if($request['preferred_industry'] === 'others') {
            $cv->other_preferred_industry = $request['other_preferred_industry_second'];
        } else {
            $cv->preferred_industry_id = $request['preferred_industry'];
        }

        $cv->most_preferred_country_id = $request['most_preferred_country'] ?: $cv->most_preferred_country_id;
        $cv->most_preferred_state_id = $request['most_preferred_state'] ?: $cv->most_preferred_state_id;

        $cv->preferred_country_id = $request['preferred_country'] ?: $cv->preferred_country_id;
        $cv->preferred_state_id = $request['preferred_state'] ?: $cv->preferred_state_id;

        $cv->has_hobbies = $request['hobbies'] ?: $cv->has_hobbies;

        return $cv->save();
    }

    public function handle_update_hobbies(Request $request, Cv $cv)
    {   
        return $cv->update([
            'hobbies' => json_encode($request['hobbies']) ?? '',
            'additional_information' => $request['additional_information'] ?: $cv->additional_information,
        ]);
    }

    
}