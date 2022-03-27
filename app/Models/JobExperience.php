<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobExperience extends Model
{
    use HasFactory;

    protected $casts = [
        'job_description' => 'array'
    ];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }
 
    public function roles(): HasMany
    {
        return $this->hasMany(JobExperienceRoles::class, 'job_experience_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(EmployementRole::class, 'employement_roles_id');
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(IndustrialSector::class, 'industrial_sectors_id');
    }
}
