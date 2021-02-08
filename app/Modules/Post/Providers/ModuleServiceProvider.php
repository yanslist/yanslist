<?php

namespace App\Modules\Post\Providers;

use App\Modules\Post\Models\Post;
use App\Modules\Post\Models\PostType;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Post::class,
    ];

    protected $enums = [
        PostType::class
    ];
}
