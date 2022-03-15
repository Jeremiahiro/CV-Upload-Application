<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TertiaryEducation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        //
    ];

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(TertiaryInstitution::class, 'tertiary_institutions_id');
    }

    public function institution_type(): BelongsTo
    {
        return $this->belongsTo(TertiaryTypes::class, 'tertiary_types_id');
    }

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(TertiaryQualifications::class, 'tertiary_qualifications_id');
    }

}
