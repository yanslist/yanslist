<?php

namespace App\Modules\Post\Models;

use App\Modules\Post\Contracts\PostType as PostTypeContract;
use Konekt\Enum\Enum;

class PostType extends Enum implements PostTypeContract
{
    const __default = self::WORK;

    const SKILL = 'skill';
    const WORK = 'work';
    const TALENT = 'talent';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::SKILL => __('Skill'),
            self::WORK => __('Work'),
            self::TALENT => __('Talent')
        ];
    }
}
