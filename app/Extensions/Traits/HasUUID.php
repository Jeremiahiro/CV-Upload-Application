<?php

namespace App\Extensions\Traits;

use Illuminate\Database\Eloquent\Model;
use Str;

trait HasUUID
{
    public static function bootHasUUID(): void
    {
        static::creating(function (Model $model) {
            $model->uuid = Str::uuid();
        });
    }

}
