<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
class EmployementRole extends Model
{
    use HasFactory;

    public function scopeSearch(Builder $builder, Collection $data)
    {
        if ($data->has('search')) {
            $search = $data->get('search');
            $builder
                ->where('name', 'like', "%{$search}%");
        }
    }
}
