<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referees extends Model
{
    use HasFactory;

    public function cv(): BelongsTo
    {
        return $this->belongsTo(Cv::class);
    }

}
