<?php

namespace App\Models;

class LeadPosType
{
    const LEGACY    = 1;
    const CLOUD     = 2;
    const IOS       = 3;

    public static function all()
    {
        return [
            static::LEGACY  => ['related_proposal_id' => '18','name' => 'Legacy'],
            static::CLOUD   => ['related_proposal_id' => '49','name' => 'Cloud'],
            static::IOS     => ['related_proposal_id' => '50','name' => 'iOs'],
        ];
    }
}
