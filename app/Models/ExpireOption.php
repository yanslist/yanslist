<?php

namespace App\Models;

use Konekt\Enum\Enum;

class ExpireOption extends Enum
{
    const __DEFAULT = self::ONE_WEEK;

    const ONE_WEEK = '1 week';
    const TWO_WEEK = '2 weeks';
    const ONE_MONTH = '1 month';
    const TWO_MONTH = '2 months';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::ONE_WEEK => __('1 week'),
            self::TWO_WEEK => __('2 weeks'),
            self::ONE_MONTH => __('1 month'),
            self::TWO_MONTH => __('2 months')
        ];
    }
}
