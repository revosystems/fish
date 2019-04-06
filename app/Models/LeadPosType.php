<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadPosType extends Model
{
    public function soft()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function pos()
    {
        return $this->hasMany(LeadPos::class);
    }

    public function relatedProposal()
    {
        return $this->belongsTo(LeadProposal::class, 'related_proposal_id');
    }
}
