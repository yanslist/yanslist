<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Region.
 *
 * @package namespace App\Models;
 */
class Region extends Model implements Transformable
{
    use TransformableTrait;

    protected $guarded = [];

    protected $appends = ['localized_name'];

    public function districts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(District::class);
    }

    public function townships(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Township::class, District::class);
    }

    public function getLocalizedNameAttribute()
    {
        return (LaravelLocalization::getCurrentLocale() == 'my') ? $this->name_mm : $this->name;
    }

}
