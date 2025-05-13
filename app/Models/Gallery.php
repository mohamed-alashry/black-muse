<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $url
 * @property string $type Either "image", "video", or "link"
 * @property int $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'id'   => 'integer',
        'sort' => 'integer',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        if ($media && str_starts_with($media->mime_type, 'video/')) {
            $this->addMediaConversion('thumb')
                ->extractVideoFrameAtSecond(1)
                ->width(368)
                ->nonQueued()
                ->nonOptimized();
        }
        if ($media && str_starts_with($media->mime_type, 'image/')) {
            $this->addMediaConversion('thumb')
                ->extractVideoFrameAtSecond(1)
                ->width(368)
                ->nonQueued()
                ->nonOptimized();
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
            ->singleFile();
    }
}
