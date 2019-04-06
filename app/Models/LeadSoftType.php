<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadSoftType extends Model
{
    public function soft()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function proposal()
    {
        return $this->hasOne(LeadProposal::class,'related_proposal_id');
    }
}
