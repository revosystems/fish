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
            static::LEGACY  => ['related_proposal' => Proposal::POS_LEGACY, 'name' => 'Legacy'],
            static::CLOUD   => ['related_proposal' => Proposal::POS_CLOUD, 'name' => 'Cloud'],
            static::IOS     => ['related_proposal' => Proposal::POS_IOS, 'name' => 'iOs'],
        ]);
    }

    public function relatedProposal()
    {
        if (! isset($this->reference['related_proposal'])) {
            return;
        }
        return Proposal::find($this->reference['related_proposal']);
    }
}
