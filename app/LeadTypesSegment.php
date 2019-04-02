<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadTypesSegment extends Model
{
//    protected $table = 'lead_types_segments'
    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }
}