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
use App\Models\SecondaryQualifications;
use App\Models\TertiaryEducation;
use App\Models\TertiaryTypes;
use App\Models\TertiaryQualifications;
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

    public function get_countries()
    {
        return Country::get(['id', 'name']);
    }

    public function get_states(Country $country)
    {
        return State::where('country_id', $country->id)->get(['id', 'name']);
    }

    public function get_states_in_nigeria()
    {
        $country = Country::where('sortname', 'NG')->first();
        return State::where('country_id', $country->id)->get(['id', 'name']);
    }

    public function get_secondary_qualifications()
    {
        return SecondaryQualifications::get(['id', 'name']);
    }
    
    public function get_secondary_education()
    {
        return SecondaryEducation::with(['qualification'])->get(['id', 'name']);
    }

    public function get_tertiary_types()
    {
        return TertiaryTypes::with(['institutions'])->get(['id', 'name']);
    }

    public function get_tertiary_education(Cv $cv)
    {
        return TertiaryEducation::with(['institution', 'institution_type', 'qualification'])->where('cv_id', $cv['id'])->get();
    }

    public function get_tertiary_qualifications()
    {
        return TertiaryQualifications::get(['id', 'name']);
    }

    public function get_professional_institutions()
    {
        return ProfessionalInstitutions::get();
    }

    public function get_professional_qualification_types(Cv $cv)
    {
        return ProfessionalQualifications::get();
    }

    public function get_professional_qualifications(Cv $cv)
    {
        return Qualifications::with(['qualification', 'awarding_institution'])->where('cv_id', $cv['id'])->get();
    }

    public function get_industry_sector()
    {
        return IndustrialSector::get(['id', 'name']);
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
}
