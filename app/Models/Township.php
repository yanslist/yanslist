<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Township.
 *
 * @package namespace App\Models;
 */
class Township extends Model implements Transformable
{
    use TransformableTrait;

    protected $guarded = [];

    public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getLocalizedNameAttribute()
    {
        return (LaravelLocalization::getCurrentLocale() == 'my') ? $this->name_mm : $this->name;
    }

}
