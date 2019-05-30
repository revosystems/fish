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

    public function propertySpaces()
    {
        return $this->hasMany(LeadPropertySpace::class, null, 'lead_property_spaces');
    }

    public function softs()
    {
        return $this->hasMany(LeadSoft::class, null, 'lead_softs');
    }

    public function generalTypology()
    {
        return GeneralTypology::find($this->general_typology);
    }

    public function product()
    {
        return Product::find($this->product);
    }

    public function typeSegment()
    {
        return TypeSegment::find($this->type_segment);
    }

    public function relatedProposal()
    {
        if (! $this->pos) {
            return null;
        }
        return $this->pos()->posType()->relatedProposal();
    }

    public function pos()
    {
        return Pos::find($this->pos);
    }

    public function getParentOrganizations()
    {
        return $this->organization->getParentOrganizations()->push($this->organization);
    }
}
