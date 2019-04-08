<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadSoft extends Model
{
    protected $table = 'lead_soft';
    public function type()
    {
        return $this->belongsTo(LeadType::class);
    }

    public function typeCat()
    {
        return $this->belongsTo(LeadSoftType::class,'lead_soft_type_id');
    }
}
