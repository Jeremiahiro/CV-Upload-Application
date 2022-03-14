<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobExperience extends Model
{
    use HasFactory;

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }

    public function roles(): HasMany
    {
        return $this->hasMany(JobExperienceRoles::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(IndustrialSector::class);
    }
}
