<?php

namespace App\Models;

use App\Extensions\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cv extends Model
{
    use HasFactory, HasUUID;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): HasOne
    {
        return $this->hasOne(Country::class, 'country_id');
    }

    public function state(): HasOne
    {
        return $this->hasOne(State::class, 'state_id');
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'city_id');
    }

    public function nysc_detail(): HasOne
    {
        return $this->hasOne(NyscDetails::class, 'cv_id');
    }

    public function secondary_educations(): HasMany
    {
        return $this->hasMany(SecondaryEducation::class, 'cv_id');
    }

    public function tertiary_educations(): HasMany
    {
        return $this->hasMany(TertiaryEducation::class, 'cv_id');
    }

    public function job_expereinces(): HasMany
    {
        return $this->hasMany(JobExperience::class, 'cv_id');
    }

    public function referees(): HasMany
    {
        return $this->hasMany(Referees::class, 'cv_id');
    }
    

}
