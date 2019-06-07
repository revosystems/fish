<?php

namespace App\Models;

class Probability extends FishDataBase
{
    const VERY_LOW        = 1;
    const LOW             = 2;
    const MEDIUM          = 3;
    const HIGH            = 4;
    const VERY_HIGH       = 5;

    public static function all()
    {
        return collect([
            static::VERY_LOW  => ['name' => __('admin.probability.veryLow')],
            static::LOW       => ['name' => __('admin.probability.low')],
            static::MEDIUM    => ['name' => __('admin.probability.medium')],
            static::HIGH      => ['name' => __('admin.probability.high')],
            static::VERY_HIGH => ['name' => __('admin.probability.veryHigh')],
        ]);
    }
}
