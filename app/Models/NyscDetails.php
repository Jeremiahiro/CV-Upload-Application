<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NyscDetails extends Model
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

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

}
