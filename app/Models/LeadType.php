<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\type;

class LeadType extends Model
{
//    protected $table = 'lead_types';
    public function segments()
    {
        return $this->hasMany(LeadTypesSegment::class);
    }

    public function spaces()
    {
        return $this->hasMany(LeadPropertySpaces::class);
    }

    public function software()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function pos()
    {
        return $this->hasMany(LeadPos::class);
    }
}
