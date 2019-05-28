<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use StatusTrait;
    use Taggable;

    const PRODUCT_XEF       = 1;
    const PRODUCT_RETAIL    = 2;

    protected $guarded = [];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generalTypology()
    {
        return $this->belongsTo(LeadGeneralTypology::class);
    }

    public function propertySpaces()
    {
        return $this->hasMany(LeadPropertySpace::class, 'lead_property_spaces');
    }

    public function pos()
    {
        return $this->belongsTo(Pos::class);
    }

    public function getRelatedProposal()
    {
        //dd($this->pos()->posType()->relatedProposal());
        if (! $this->pos) {
            return null;
        }
        return $this->pos->posType->relatedProposal;
    }

    public function getParentOrganizations()
    {
        return $this->organization->getParentOrganizations()->push($this->organization);
    }
    
    public static function products()
    {
        return [
            Lead::PRODUCT_XEF    => "Xef",
            Lead::PRODUCT_RETAIL => "Retail",
        ];
    }
}
