<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Keyword extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($keyword) {
            $keyword->slug = Str::slug($keyword->name);
        });

        static::updating(function ($keyword) {
            $keyword->slug = Str::slug($keyword->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}