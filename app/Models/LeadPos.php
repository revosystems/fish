<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadPos extends Model
{
    protected $table = 'lead_pos';

    public function posType()
    {
        return $this->belongsTo(LeadPosType::class,"pos_type_id");
    }
}
