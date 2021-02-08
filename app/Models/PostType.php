<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostType extends Enum
{
    const __DEFAULT = self::WORK;

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
