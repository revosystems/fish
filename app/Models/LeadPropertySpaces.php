<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadPropertySpaces extends Model
{
    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }
}
