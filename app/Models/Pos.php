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
    const ICG_HIOPOS    = 8;
    const HOSTEL_TACTIL  = 9;
    const SIGHORE_ICS   = 10;
    const L_ADDITION    = 11;
    const LIGHTSPEED    = 12;
    const MISS_TIPSI    = 13;
    const NCR_ALOHA     = 14;
    const NUMIER        = 15;
    const ORACLE_MICROS = 16;
    const STORYOUS      = 17;
    const TECHNI_WEB    = 18;
    const TILLER        = 19;
    const TOUCHBISTRO   = 20;

    public static function all()
    {
        return collect([
            static::AGORA         => ['posType' => PosType::LEGACY, 'name' => 'Ágora'],
            static::BDP           => ['posType' => PosType::LEGACY, 'name' => 'BDP'],
            static::CUINER        => ['posType' => PosType::LEGACY, 'name' => 'Cuiner'],
            static::DUAL_LINK     => ['posType' => PosType::IOS, 'name' => 'Dual link'],
            static::GASTROFIX     => ['posType' => PosType::IOS, 'name' => 'GASTROFIX'],
            static::GLOP          => ['posType' => PosType::LEGACY, 'name' => 'GLOP'],
            static::HOSTEL_TACTIL => ['posType' => PosType::LEGACY, 'name' => 'Hosteltáctil'],
            static::ICG           => ['posType' => PosType::LEGACY, 'name' => 'ICG'],
            static::ICG_HIOPOS    => ['posType' => PosType::CLOUD, 'name' => 'ICG HioPOS'],
            static::L_ADDITION    => ['posType' => PosType::IOS, 'name' => 'L\'Addition'],
            static::LIGHTSPEED    => ['posType' => PosType::IOS, 'name' => 'Lightspeed'],
            static::MISS_TIPSI    => ['posType' => PosType::CLOUD, 'name' => 'Miss Tipsi'],
            static::NCR_ALOHA      => ['posType' => PosType::LEGACY, 'name' => 'NCR Aloha'],
            static::NUMIER         => ['posType' => PosType::LEGACY, 'name' => 'Numier'],
            static::ORACLE_MICROS  => ['posType' => PosType::LEGACY, 'name' => 'Oracle Micros'],
            static::SIGHORE_ICS    => ['posType' => PosType::LEGACY, 'name' => 'Sighore-ICS'],
            static::STORYOUS       => ['posType' => PosType::CLOUD, 'name' => 'Storyous'],
            static::TECHNI_WEB     => ['posType' => PosType::LEGACY, 'name' => 'Techni-Web'],
            static::TILLER         => ['posType' => PosType::IOS, 'name' => 'Tiller'],
            static::TOUCHBISTRO    => ['posType' => PosType::IOS, 'name' => 'TouchBistro'],
        ]);
    }

    public function posType()
    {
        return PosType::find($this->posType);
    }
}
