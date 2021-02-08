<?php

namespace App\Modules\Post\Models;

use App\Modules\Post\Factories\PostFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Post\Contracts\Post as PostContract;
use Konekt\Enum\Eloquent\CastsEnums;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements PostContract
{
    use CastsEnums, Uuids, HasFactory, HasSlug;

    protected $table = 'posts';

    protected $guarded = ['uuid', 'created_at', 'updated_at'];

    protected $enums = [
        'type' => 'PostTypeProxy@enumClass'
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

    /**
     * // https://github.com/nWidart/laravel-modules/issues/1094
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return PostFactory::new();
    }

}
