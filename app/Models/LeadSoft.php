<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadSoft extends Model
{
    protected $table = 'lead_soft';
    public function softType()
    {
        return $this->belongsTo(LeadSoftType::class, 'soft_type_id');
    }
}
