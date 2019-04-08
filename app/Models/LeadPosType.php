<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadPosType extends Model
{
    public function soft()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function pos()
    {
        return $this->hasMany(LeadPos::class,'lead_pos_id');
    }
}
