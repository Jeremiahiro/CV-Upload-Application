<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SecondaryEducation extends Model
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

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(SecondaryQualifications::class, 'secondary_qualifications_id');
    }

}
