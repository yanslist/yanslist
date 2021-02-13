<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostType extends Enum
{
    const __DEFAULT = self::AID;

    const AID = 'aid';
    const SHELTER = 'shelter';
    const LABOUR = 'labour';
    const SERVICE = 'service';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::AID => __('Aid'),
            self::SHELTER => __('Shelter'),
            self::LABOUR => __('Labour'),
            self::SERVICE => __('Service')
        ];
    }
}
