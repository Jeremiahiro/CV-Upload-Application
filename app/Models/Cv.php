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

    protected $guarded = [];

    protected $casts = [
        'tertiary_institution' => 'boolean',
        'hobbies' => 'json',
        'has_hobbies' => 'boolean',
        'professional_qualification' => 'boolean',
        'completed_nysc' => 'boolean',
        'location_preference' => 'boolean',
        'employment_status' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
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

    public function preferred_state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'id', 'preferred_state_id');
    }

    public function preferred_industry(): BelongsTo
    {
        return $this->belongsTo(IndustrialSector::class, 'id', 'preferred_industry_id');
    }
    

}
