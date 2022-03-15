<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TertiaryInstitution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(TertiaryTypes::class, 'tertiary_types_id');
    }
    
}
