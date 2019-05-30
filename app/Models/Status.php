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
            static::NEW           => ['name' => 'new'],
            static::FIRST_CONTACT => ['name' => 'first-contact'],
            static::VISITED       => ['name' => 'visited'],
            static::COMPLETED     => ['name' => 'completed'],
            static::FAILED        => ['name' => 'failed'],
        ]);
    }

    public static function text($status)
    {
        return static::find($status)->name;
    }
}
