<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Content extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'image_1',
        'image_2',
        'image_3',
        'category_id',
        'publish_date'
    ];

    protected $casts = [
        'publish_date' => 'datetime:Y-m-d',
        'additional_images' => 'array', // This will turn the JSON into a PHP array

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->slug = self::generateSlug($content->title);

            if ($content->publish_date && is_string($content->publish_date)) {
                $content->publish_date = Carbon::parse($content->publish_date);
            }
        });

        static::updating(function ($content) {
            if ($content->isDirty('title')) {
                $content->slug = self::generateSlug($content->title);
            }

            if ($content->isDirty('publish_date') && is_string($content->publish_date)) {
                $content->publish_date = Carbon::parse($content->publish_date);
            }
        });
    }

    public static function generateSlug(string $title): string
    {
        $slug = Str::slug($title);

        if (empty($slug)) {
            $slug = 'content-' . substr(md5($title . time()), 0, 8);
        }

        $originalSlug = $slug;
        $count = 1;
        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function scopePublished($query)
    {
        return $query->where('publish_date', '<=', now());
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFormattedPublishDateAttribute(): string
    {
        return $this->publish_date 
            ? $this->publish_date->format('M d, Y') 
            : 'Not set';
    }

    public function getFormDateAttribute(): ?string
    {
        return $this->publish_date
            ? $this->publish_date->format('Y-m-d')
            : null;
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'saved_contents')
                    ->withTimestamps();
    }
}
