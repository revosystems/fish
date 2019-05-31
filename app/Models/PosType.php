<?php

namespace App\Models;

class PosType extends FishDataBase
{
    const LEGACY    = 1;
    const CLOUD     = 2;
    const IOS       = 3;

    public static function all()
    {
        return collect([
            static::LEGACY  => ['proposal' => Proposal::POS_LEGACY, 'name' => 'Legacy'],
            static::CLOUD   => ['proposal' => Proposal::POS_CLOUD, 'name' => 'Cloud'],
            static::IOS     => ['proposal' => Proposal::POS_IOS, 'name' => 'iOs'],
        ]);
    }

    public function proposal()
    {
        if (! isset($this->reference['proposal'])) {
            return;
        }
        return Proposal::find($this->reference['proposal']);
    }
}
