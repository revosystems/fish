<?php

namespace App\Models;

class PosType extends FishDataBase
{
    const LEGACY    = 1;
    const CLOUD     = 2;
    const IOS       = 3;

    public static function all()
    {
        return parent::all()->union([
            static::LEGACY  => ['related_proposal' => 18, 'name' => 'Legacy'],
            static::CLOUD   => ['related_proposal' => 49, 'name' => 'Cloud'],
            static::IOS     => ['related_proposal' => 50, 'name' => 'iOs'],
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
