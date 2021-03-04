<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Post.
 *
 * @package namespace App\Models;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait, CastsEnums, Uuids, HasFactory, HasSlug;

    protected $table = 'posts';

    protected $fillable = [
        'type', 'is_offer', 'title', 'body', 'region_id', 'township_id', 'user_id', 'email', 'expire_at'
    ];

    protected $appends = ['location', 'duration', 'ogs'];

    protected $dates = ['expire_at'];

    protected $enums = [
        'type' => PostType::class
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function township(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Township::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getLocationAttribute()
    {
        return $this->township->localized_name.', '.$this->region->localized_name;
    }

    public function getDurationAttribute()
    {
        return $this->expire_at->format(config('ylist.format.date'));
    }

    public function getOgsAttribute()
    {
        $title = __('post.types.'.$this->type->value()).' ';
        $title .= ($this->is_offer) ? __('main.is_offer') : __('main.not_offer');
        $title .= ' @'.$this->location;
        return [
            'type' => 'website',
            'url' => route('view', ['post' => $this]),
            'title' => $title,
            'description' => $this->title,
            'image' => asset('storage/qrcodes/'.$this->qrcode),
        ];
    }

}
