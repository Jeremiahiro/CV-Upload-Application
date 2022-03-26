<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class State extends Model
{
    use HasFactory;

    public function cv(): HasMany
    {
        return $this->hasMany(Cv::class);
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
