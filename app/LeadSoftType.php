<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadSoftType extends Model
{
//    protected $table = 'lead_soft_types';

    public function soft()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function proposal()
    {
        return $this->hasOne(LeadProposal::class,'related_proposal_id');
    }
}
