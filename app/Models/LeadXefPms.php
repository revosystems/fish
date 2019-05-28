<?php

namespace App\Models;

class LeadXefPms
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
            static::IBELSA        => 'Ibelsa',
            static::MEDALLION     => 'Medallion',
            static::ROCKETBEDS    => 'Rocketbeds',
            static::SIHOT         => 'Sihot',
            static::TESIPRO       => 'Tesipro',
            static::ACIGRUP       => 'Acigrup',
            static::LEAN_HOTEL    => 'LEAN Hotel',
            static::PROTEL        => 'Protel',
            static::MEWS_SYSTEMS  => 'Mews Systems',
        ];
    }

    public static function find($lead)
    {
        if ($lead->generalTypology->name != "Hotel") {
            return "";
        }
        return $lead->xef_pms == -1 ? "Otro: {$lead->xef_pms_other}" : App\Models\LeadXefPms::all()[$lead->xef_pms];
    }
}
