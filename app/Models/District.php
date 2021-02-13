<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class District.
 *
 * @package namespace App\Models;
 */
class District extends Model implements Transformable
{
    use TransformableTrait;

    protected $guarded = [];

    public function townwhips(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Township::class);
    }

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
