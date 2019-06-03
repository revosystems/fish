<?php

namespace App\Models;

class TypeSegment extends FishDataBase
{
    const SEGMENT_SMALL         = 1;
    const SEGMENT_MEDIUM        = 2;
    const SEGMENT_LARGE         = 3;

    public static function all()
    {
        return collect([
            static::SEGMENT_SMALL  => ['name' => __('admin.small')],
            static::SEGMENT_MEDIUM => ['name' => __('admin.medium')],
            static::SEGMENT_LARGE  => ['name' => __('admin.large')],
        ]);
    }
}
