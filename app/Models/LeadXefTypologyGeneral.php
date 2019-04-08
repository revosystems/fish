<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadXefTypologyGeneral extends Model
{
    protected $table = 'lead_xef_typology_general';

    public function proposal()
    {
        return $this->hasOne(LeadProposal::class,'lead_proposal_id');
    }
}
