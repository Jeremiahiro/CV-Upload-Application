<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobExperienceRoles extends Model
{
    use HasFactory;

    public function job_experience(): BelongsTo
    {
        return $this->belongsTo(JobExperience::class);
    }

}
