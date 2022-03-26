<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
class TertiaryInstitution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type(): BelongsTo
    {
        return $this->belongsTo(TertiaryTypes::class, 'tertiary_types_id');
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
