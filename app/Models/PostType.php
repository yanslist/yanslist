<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostType extends Enum
{
    const __DEFAULT = self::AID;

    const AID = 'aid';
    const LABOUR = 'labour';
    const SERVICE = 'service';
    const SHELTER = 'shelter';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::AID => __('Aid'),
            self::LABOUR => __('Labour'),
            self::SERVICE => __('Service'),
            self::SHELTER => __('Shelter'),
        ];
    }
}
