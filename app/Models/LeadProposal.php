<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadProposal extends Model
{
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function generalTypology()
    {
        return $this->belongsTo(LeadGeneralTypology::class);
    }
}
