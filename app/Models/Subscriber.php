<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public function savedContents()
    {
        return $this->belongsToMany(Content::class, 'saved_contents')
                    ->withTimestamps();
    }
}