<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Cv;
use App\Models\IndustrialSector;
use App\Models\JobExperience;
use App\Models\JobExperienceRoles;
use App\Models\ProfessionalInstitutions;
use App\Models\ProfessionalQualifications;
use App\Models\Qualifications;
use App\Models\Referees;
use App\Models\State;
use App\Models\SecondaryEducation;
use App\Models\SecondaryGrades;
use App\Models\SecondaryQualifications;
use App\Models\SecondarySubjects;
use App\Models\TertiaryCourses;
use App\Models\TertiaryCourseTypes;
use App\Models\TertiaryEducation;
use App\Models\TertiaryInstitution;
use App\Models\TertiaryTypes;
use App\Models\TertiaryQualifications;
use App\Models\TertiaryQualificationTypes;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OtherDataRepository
{

    public function get_cv()
    {
        return Cv::where('user_id', Auth::id())
                        ->with([
                            'country',
                            'state',
                            'nysc_detail',
                            'secondary_educations',
                            'tertiary_educations',
                            'job_expereinces',
                            'referees',
                            'preferred_state',
                            'preferred_industry',
                            'qualifications'
                        ])
                        ->first();
    }

    public function get_countries(Collection $data)
    {
        return Country::search($data)->get(['id', 'name']);
    }

    public function get_states(Collection $data, Country $country)
    {
        return State::where('country_id', $country->id)->search($data)->get(['id', 'name']);
    }

    public function get_states_in_nigeria(Collection $data)
    {
        $country = Country::where('sortname', 'NG')->first();
        return State::where('country_id', $country->id)->search($data)->get(['id', 'name']);
    }

    public function get_secondary_qualifications(Collection $data)
    {
        $response = SecondaryQualifications::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_secondary_subjects(Collection $data)
    {
        return SecondarySubjects::search($data)->get(['id', 'name']);
    }

    public function get_secondary_grades(Collection $data)
    {
        return SecondaryGrades::search($data)->get(['id', 'name']);
    }
    
    public function get_secondary_education()
    {
        return SecondaryEducation::with(['qualification'])->get(['id', 'name']);
    }

    public function get_tertiary_types(Collection $data)
    {
        $response = TertiaryTypes::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_tertiary_institutions_by_type(Collection $data, TertiaryTypes $tertiaryTypes)
    {
        $response = TertiaryInstitution::where('tertiary_types_id', $tertiaryTypes['id'])
                                        ->search($data)
                                        ->orderBy('name', 'asc')
                                        ->get(['id', 'name'])
                                        ->toArray();
                                        
        return $this->with_others($response);
    }

    public function get_tertiary_institutions(Collection $data)
    {
        $response = TertiaryInstitution::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_tertiary_education(Cv $cv)
    {
        return TertiaryEducation::where('cv_id', $cv['id'])->get();
    }

    public function get_tertiary_qualifications(Collection $data)
    {
        $response = TertiaryQualificationTypes::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_tertiary_course(Collection $data)
    {
        $response = TertiaryCourses::search($data)->select(['id', 'name'])->distinct()->orderBy('name', 'asc')->get()->toArray();
        return $this->with_others($response);
    }

    public function get_tertiary_course_type(Collection $data)
    {
        $response = TertiaryCourseTypes::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }
    
    public function get_tertiary_grade(Collection $data)
    {
        $response = TertiaryQualifications::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_professional_institutions(Collection $data)
    {
        $response = ProfessionalInstitutions::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_professional_qualification_types(Collection $data)
    {
        $response = ProfessionalQualifications::search($data)->orderBy('name', 'asc')->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_professional_qualifications(Cv $cv)
    {
        return Qualifications::with(['qualification', 'awarding_institution'])->where('cv_id', $cv['id'])->get();
    }

    public function get_industry_sector(Collection $data)
    {
        $response = IndustrialSector::search($data)->get(['id', 'name'])->toArray();
        return $this->with_others($response);
    }

    public function get_previous_experiecne(Cv $cv)
    {
        return JobExperience::with(['roles', 'sector'])->where('cv_id', $cv['id'])->get();
    }

    public function get_employment_roles(JobExperience $employement)
    {
        return JobExperienceRoles::where('job_experience_id', $employement['id'])->get();
    }

    public function get_referee(Cv $cv)
    {
        return Referees::where('cv_id', $cv['id'])->get();
    }

    public function with_others($data): Collection
    {
        if($data) {
            $others = [
                'id'    => 'others',
                'name'  => 'Others',
            ];
    
            return collect(array_merge($data, ['-1' => $others]));
        } else {
            return $data;
        }
    }
}
