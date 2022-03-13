<?php

namespace App\Repositories;

use App\Http\Resources\CountryResource;
use App\Models\Country;

class OtherDataRepository
{

    public function get_countries()
    {
        $countries = Country::all();
        return CountryResource::collection($countries);
    }
}