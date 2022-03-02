<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cv extends Model
{
    use HasFactory;

    public function country(): HasOne
    {
        return $this->hasone(Country::class, 'country_id');
    }

    public function state(): HasOne
    {
        return $this->hasone(State::class, 'state_id');
    }

    public function city(): HasOne
    {
        return $this->hasone(City::class, 'city_id');
    }

    public function secondary_education(): HasMany
    {
        return $this->hasMany(SecondaryEducation::class, 'cv_id');
    }

    public function tertiary_education(): HasMany
    {
        return $this->hasMany(TertiaryEducation::class, 'cv_id');
    }

}
