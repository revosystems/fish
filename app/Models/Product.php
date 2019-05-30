<?php

namespace App\Models;

class Product extends FishDataBase
{
    const XEF       = 1;
    const RETAIL    = 2;

    public static function all()
    {
        return collect([
            static::XEF     => ['key' => 'xef', 'name' => 'Xef'],
            static::RETAIL  => ['key' => 'retail', 'name' => 'Retail'],
        ]);
    }

    public function relatedProposal()
    {
        return Proposal::find($this->reference['related_proposal']);
    }
}
