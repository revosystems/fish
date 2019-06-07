<?php

namespace App\Models;

class Status extends FishDataBase
{
    const NEW           = 1;
    const FIRST_CONTACT = 2;
    const VISITED       = 3;
    const COMPLETED     = 4;
    const FAILED        = 5;

    public static function all()
    {
        return collect([
            static::NEW           => ['key' => 'new', 'name' => __('admin.new')],
            static::FIRST_CONTACT => ['key' => 'first-contact', 'name' => __('admin.first-contact')],
            static::VISITED       => ['key' => 'visited', 'name' => __('admin.visited')],
            static::COMPLETED     => ['key' => 'completed', 'name' => __('admin.completed')],
            static::FAILED        => ['key' => 'failed', 'name' => __('admin.failed')],
        ]);
    }

    public static function text($status)
    {
        return static::find($status)->name;
    }
}
