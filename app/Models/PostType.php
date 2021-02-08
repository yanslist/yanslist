<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostType extends Enum
{
    const __default = self::WORK;

    const SKILL = 'skill';
    const WORK = 'work';
    const TALENT = 'talent';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::SKILL => __('Organization'),
            self::WORK => __('Individual'),
            self::TALENT => __('Talent')
        ];
    }
}
