<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class SecondaryEducationQualifications extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subject(): HasOne   
    {
        return $this->hasOne(SecondarySubjects::class, 'id', 'secondary_subject');
    }

    public function grade(): HasOne
    {
        return $this->hasOne(SecondaryGrades::class, 'id', 'secondary_grades');
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
