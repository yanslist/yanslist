<?php

namespace App\Modules\Post\Models;

use App\Modules\Post\Factories\PostFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Post\Contracts\Post as PostContract;
use Konekt\Enum\Eloquent\CastsEnums;

class Post extends Model implements PostContract
{
    use CastsEnums, Uuids, HasFactory;

    protected $table = 'posts';

    protected $guarded = ['uuid', 'created_at', 'updated_at'];

    protected $enums = [
        'type' => 'PostTypeProxy@enumClass'
    ];

    // https://github.com/nWidart/laravel-modules/issues/1094

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PostFactory::new();
    }

}
