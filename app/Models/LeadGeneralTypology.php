<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadGeneralTypology extends Model
{
    public function proposal()
    {
        return $this->belongsTo(LeadProposal::class, 'proposal_id');
    }

    public function relatedProposals()
    {
        return $this->belongsToMany(LeadProposal::class, 'lead_general_typologies_related_proposals', 'general_typology_id','related_proposal_id');
    }
}
