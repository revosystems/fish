<?php

namespace App\Models;

class Pos extends FishDataBase
{
    const AGORA         = 1;
    const BDP           = 2;
    const CUINER        = 3;
    const DUAL_LINK     = 4;
    const GASTROFIX     = 5;
    const GLOP          = 6;
    const ICG           = 7;
    const ICG_HIOPOS    = 1;
    const HOSTELTACTIL  = 8;
    const SIGHORE_ICS   = 9;
    const L_ADDITION    = 10;
    const LIGHTSPEED    = 11;
    const MISS_TIPSI    = 12;
    const NCR_ALOHA     = 13;
    const NUMIER        = 14;
    const ORACLE_MICROS = 15;
    const STORYOUS      = 16;
    const TECHNI_WEB    = 17;
    const TILLER        = 18;
    const TOUCHBISTRO   = 19;

    public static function all()
    {
        return [
            static::AGORA          => ['posType' => LeadPosType::LEGACY,    'name' => 'Ágora'],
            static::BDP            => ['posType' => LeadPosType::LEGACY,    'name' => 'BDP'],
            static::CUINER         => ['posType' => LeadPosType::LEGACY,    'name' => 'Cuiner'],
            static::DUAL_LINK      => ['posType' => LeadPosType::IOS,       'name' => 'Dual link'],
            static::GASTROFIX      => ['posType' => LeadPosType::IOS,       'name' => 'GASTROFIX'],
            static::GLOP           => ['posType' => LeadPosType::LEGACY,    'name' => 'GLOP'],
            static::HOSTELTACTIL   => ['posType' => LeadPosType::LEGACY,    'name' => 'Hosteltáctil'],
            static::ICG            => ['posType' => LeadPosType::LEGACY,    'name' => 'ICG'],
            static::ICG_HIOPOS     => ['posType' => LeadPosType::CLOUD,     'name' => 'ICG HioPOS'],
            static::L_ADDITION     => ['posType' => LeadPosType::IOS,       'name' => 'L\'Addition'],
            static::LIGHTSPEED     => ['posType' => LeadPosType::IOS,       'name' => 'Lightspeed'],
            static::MISS_TIPSI     => ['posType' => LeadPosType::CLOUD,     'name' => 'Miss Tipsi'],
            static::NCR_ALOHA      => ['posType' => LeadPosType::LEGACY,    'name' => 'NCR Aloha'],
            static::NUMIER         => ['posType' => LeadPosType::LEGACY,    'name' => 'Numier'],
            static::ORACLE_MICROS  => ['posType' => LeadPosType::LEGACY,    'name' => 'Oracle Micros'],
            static::SIGHORE_ICS    => ['posType' => LeadPosType::LEGACY,    'name' => 'Sighore-ICS'],
            static::STORYOUS       => ['posType' => LeadPosType::CLOUD,     'name' => 'Storyous'],
            static::TECHNI_WEB     => ['posType' => LeadPosType::LEGACY,    'name' => 'Techni-Web'],
            static::TILLER         => ['posType' => LeadPosType::IOS,       'name' => 'Tiller'],
            static::TOUCHBISTRO    => ['posType' => LeadPosType::IOS,       'name' => 'TouchBistro'],
        ];
    }
}
