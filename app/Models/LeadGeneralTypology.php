<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadGeneralTypology extends Model
{
    public function proposal()
    {
        return $this->belongsTo(LeadProposal::class, 'proposal_id');
    }
}
