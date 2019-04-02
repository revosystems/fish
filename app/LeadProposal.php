<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadProposal extends Model
{
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function typologyGeneral()
    {
        return $this->belongsTo(LeadXefTypologyGeneral::class,'lead_xef_typology_general');
    }
}
