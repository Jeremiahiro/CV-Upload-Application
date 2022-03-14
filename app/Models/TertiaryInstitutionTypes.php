<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TertiaryInstitutionTypes extends Model
{
    use HasFactory;

    public function institutions(): HasMany
    {
        return $this->hasMany(TertiaryInstitution::class, 'tertiary_institution_type_id');
    }
}
