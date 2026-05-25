<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'year',
        'type',
        'length',
        'beam',
        'deck',
        'sail_count',
        'build_time',
        'guest_capacity',
        'cabin_count',
        'ensuite',
        'cruise_speed',
        'max_speed',
        'description',
        'cover_image',
        'gallery_images',
        'sort_order'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'ensuite' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::observe(\App\Observers\ImageOptimizeObserver::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}