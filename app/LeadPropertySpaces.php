<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadPropertySpaces extends Model
{
    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }
}
