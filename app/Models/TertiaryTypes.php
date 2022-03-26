<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
class TertiaryTypes extends Model
{
    use HasFactory;


    public function institutions(): HasMany
    {
        return $this->hasMany(TertiaryInstitution::class, 'tertiary_types_id');
    }

    public function scopeSearch(Builder $builder, Collection $data)
    {
        if ($data->has('search')) {
            $search = $data->get('search');
            $builder
                ->where('name', 'like', "%{$search}%");
        }
    }
}
