<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Taggable;

    const TYPE_XEF       = 1;
    const TYPE_RETAIL    = 2;


    const STATUS_NEW           = 1;
    const STATUS_FIRST_CONTACT = 2;
    const STATUS_VISITED       = 3;
    const STATUS_COMPLETED     = 4;
    const STATUS_FAILED        = 5;

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeSegment()
    {
        return $this->belongsTo(LeadTypesSegment::class);
    }

    public function generalTypology()
    {
        return $this->belongsTo(LeadGeneralTypology::class);
    }

    public function xefSpecificTypology()
    {
        return $this->belongsTo(LeadXefSpecificTypology::class);
    }

    public function xefPropertyFranchise()
    {
        return $this->belongsTo(LeadXefPropertyFranchise::class);
    }

    public function xefKds()
    {
        return $this->belongsTo(LeadXefKds::class);
    }

    public function pos()
    {
        return $this->belongsTo(LeadPos::class);
    }

    public function retailSaleMode()
    {
        return $this->belongsTo(LeadRetailSaleMode::class);
    }

    public function retailSaleLocation()
    {
        return $this->belongsTo(LeadRetailSaleLocation::class);
    }

    public function franchisePosExternal()
    {
        return $this->belongsTo(LeadFranchisePosExternal::class);
    }

    public function xefPms()
    {
        return $this->belongsTo(LeadXefPms::class);
    }

    public function erp()
    {
        return $this->belongsTo(LeadErp::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getRelatedProposal()
    {
        //dd($this->pos()->posType()->relatedProposal());
        dd($this->pos()->posType()->get());
        return $this->pos->posType->relatedProposal;
    }

    public function statusName()
    {
        return static::getStatusText($this->status);
    }

    public function statusUpdates()
    {
        return $this->hasMany(LeadStatusUpdate::class)->latest();
    }

    public static function getStatusText($status)
    {
        return static::availableStatus()[$status];
    }

    public static function availableStatus()
    {
        return [
            static::STATUS_NEW           => 'new',
            static::STATUS_FIRST_CONTACT => 'first-contact',
            static::STATUS_VISITED       => 'visited',
            static::STATUS_COMPLETED     => 'completed',
            static::STATUS_FAILED        => 'failed',
        ];
    }

    public function updateStatus($user, $body, $status)
    {
        if (! $this->user) {
            $this->update(['status' => $status, 'updated_at' => Carbon::now(), 'user_id' => $user->id]);
        } else {
            $this->update(['status' => $status, 'updated_at' => Carbon::now()]);
        }

        return $this->statusUpdates()->create(['user_id' => $user->id, 'new_status' => $status, 'body' => $body]);
    }
}
