<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostType extends Enum
{
    const __DEFAULT = self::AID;

    const AID = 'aid';
    const SERVICE = 'service';
    const SHELTER = 'shelter';
    const HEALTHCARE = 'healthcare';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::AID => __('Aid'),
            self::SERVICE => __('Service'),
            self::SHELTER => __('Shelter'),
            self::HEALTHCARE => __('Health-care'),
        ];
    }
}
