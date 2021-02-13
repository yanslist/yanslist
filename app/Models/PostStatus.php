<?php

namespace App\Models;

use Konekt\Enum\Enum;

class PostStatus extends Enum
{
    const __DEFAULT = self::PUBLISHED;

    const PUBLISHED = 'published';
    const PENDING = 'pending';
    const ARCHIVED = 'archived';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::PUBLISHED => __('Published'),
            self::PENDING => __('Pending'),
            self::ARCHIVED => __('Archived')
        ];
    }
}
