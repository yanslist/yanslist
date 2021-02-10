<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

}
