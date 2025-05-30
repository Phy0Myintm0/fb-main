<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    // Specify the table name if not default (optional)
    protected $table = 'hero_sections';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'content',
    ];

    // If you don't want timestamps (created_at, updated_at)
    public $timestamps = false;
}
