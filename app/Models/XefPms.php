<?php

namespace App\Models;

class XefPms extends FishDataBase
{
    const IBELSA        = 1;
    const MEDALLION     = 2;
    const ROCKETBEDS    = 3;
    const SIHOT         = 4;
    const TESIPRO       = 5;
    const ACIGRUP       = 6;
    const LEAN_HOTEL    = 7;
    const PROTEL        = 8;
    const MEWS_SYSTEMS  = 9;

    public static function all()
    {
        return [
            static::IBELSA        => ['name' => 'Ibelsa'],
            static::MEDALLION     => ['name' => 'Medallion'],
            static::ROCKETBEDS    => ['name' => 'Rocketbeds'],
            static::SIHOT         => ['name' => 'Sihot'],
            static::TESIPRO       => ['name' => 'Tesipro'],
            static::ACIGRUP       => ['name' => 'Acigrup'],
            static::LEAN_HOTEL    => ['name' => 'LEAN Hotel'],
            static::PROTEL        => ['name' => 'Protel'],
            static::MEWS_SYSTEMS  => ['name' => 'Mews Systems'],
        ];
    }
}
