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

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualifications::class, 'cv_id');
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
        return $this->belongsTo(State::class, 'preferred_state_id', 'id');
    }

    public function preferred_industry(): BelongsTo
    {
        return $this->belongsTo(IndustrialSector::class, 'preferred_industry_id', 'id');
    }

    public function title()
    {
        $current_role = $this->job_expereinces()->where('is_current', true)->first(); 
        $previous_role = $this->job_expereinces()->where('is_current', false)->first();

        $current_title = null;
        $previous_title = null;

        if($current_role) {
            $current_title = $current_role->employement_roles_id ? $current_role->position->name : $current_role->other_employement_role;
        }

        if($previous_role) {
            $previous_title = $previous_role->employement_roles_id ? $previous_role->position->name : $previous_role->other_employement_role;
        }

        
        return $current_role ? $current_title : $previous_title;
    }
    

}
