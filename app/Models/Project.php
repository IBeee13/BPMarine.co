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
        'sort_order',
        // Construction fields
        'is_under_construction',
        'construction_stage',
        'progress_percentage',
        'estimated_launch_date',
        'construction_cover',
        'progress_photos',
        'progress_videos',
        'progress_video_urls',
    ];

    protected $casts = [
        'gallery_images'       => 'array',
        'progress_videos'    => 'array',
        'progress_video_urls' => 'array',
        'progress_photos'      => 'array',
        'ensuite'              => 'boolean',
        'is_under_construction'=> 'boolean',
        'estimated_launch_date'=> 'date',
    ];

    protected static function booted(): void
    {
        static::observe(\App\Observers\ImageOptimizeObserver::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * Label display untuk tiap stage konstruksi
     */
    public function getConstructionStageLabelAttribute(): string
    {
        return match($this->construction_stage) {
            'design'    => 'Design',
            'keel'      => 'Keel laying',
            'hull'      => 'Hull framing',
            'fitout'    => 'Deck & fit-out',
            'finishing' => 'Finishing',
            default     => '-',
        };
    }

    /**
     * Index numerik stage (0–4) untuk frontend stage indicator
     */
    public function getConstructionStageIndexAttribute(): int
    {
        return match($this->construction_stage) {
            'design'    => 0,
            'keel'      => 1,
            'hull'      => 2,
            'fitout'    => 3,
            'finishing' => 4,
            default     => 0,
        };
    }
}