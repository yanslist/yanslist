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

}
