<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qualifications extends Model
{
    use HasFactory;

    protected $casts = [
        //
    ];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(ProfessionalQualifications::class, 'professional_qualifications_id');
    }

    public function awarding_institution(): BelongsTo
    {
        return $this->belongsTo(ProfessionalInstitutions::class, 'professional_institutions_id');
    }

}
