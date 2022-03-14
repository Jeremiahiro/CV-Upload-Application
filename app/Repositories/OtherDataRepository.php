<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\IndustrialSector;
use App\Models\SecondarySchoolQualification;
use App\Models\State;
use App\Models\TertiaryInstitutionQualifications;
use App\Models\TertiaryInstitutionTypes;

class OtherDataRepository
{
    public function get_countries()
    {
        return Country::get(['id', 'name']);
    }

    public function get_states(Country $country)
    {
        return State::where('country_id', $country->id)->get(['id', 'name']);
    }

    public function get_secondary_qualifications()
    {
        return SecondarySchoolQualification::get(['id', 'name']);
    }

    public function get_tertiary_institutions_types()
    {
        return TertiaryInstitutionTypes::with([
                                        'institutions' => fn($q) => $q->with('type:id,name,slug')
                                    ])->get(['id', 'name', 'slug']);
    }

    public function get_tertiary_qualifications()
    {
        return TertiaryInstitutionQualifications::get(['id', 'name']);
    }

    public function get_industry_sector()
    {
        return IndustrialSector::get(['id', 'name']);
    }
}
