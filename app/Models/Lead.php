<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
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

    public function statusUpdates()
    {
        return $this->hasMany(LeadStatusUpdate::class)->latest();
    }

    public function propertySpace()
    {
        return PropertySpace::find($this->property_space);
    }

    public function soft()
    {
        return Soft::find($this->soft);
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

    public function pos()
    {
        return Pos::find($this->pos);
    }

    public function posType()
    {
        if (! $this->pos) {
            return PosType::find(PosType::LEGACY);
        }
        return $this->pos()->posType();
    }

    public function erp()
    {
        return Erp::find($this->erp);
    }

    public function xefPms()
    {
        return XefPms::find($this->xef_pms);
    }

    public function getParentOrganizations()
    {
        return $this->organization->getParentOrganizations()->push($this->organization);
    }

    public function statusName()
    {
        return Status::text($this->status);
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

    public function productProposal()
    {
        if ($this->product == Product::RETAIL) {
            return Proposal::find(Proposal::REVO_RETAIL);
        }
        return Proposal::find($this->getXefProposal());
    }

    protected function xefProposal()
    {
        $xefDevices   = $this->xef_pos_critical_quantity + $this->xef_cash_quantity;
        $xef_printers = $this->xef_printers_quantity + ($this->xef_kds ? $this->xef_kds_quantity : 0);
        if ($xefDevices > 4 || $xef_printers > 3) {
            return Proposal::REVO_XEF_PRO;
        }
        if ($xefDevices > 1 || $xef_printers > 2) {
            return Proposal::REVO_XEF_PLUS;
        }
        return Proposal::REVO_XEF_BASIC;
    }

    public function xefTypologyName()
    {
        if ($this->product == Product::RETAIL) {
            return $this->generalTypology()->name;
        }
        return  "{$this->generalTypology()->name} (" . XefSpecificTypology::find($this->xef_specific_typology)->name . ")";
    }

    public function xefPmsName()
    {
        if ($this->general_typology != GeneralTypology::HOTEL) {
            return '';
        }
        if ($this->xef_pms) {
            return $this->xefPms()->name;
        }
        return $this->xef_pms_other == -1 ? "Otro: {$this->xef_pms_other}" : 'Ninguno';
    }

    public function erpName()
    {
        if ($this->erp > 0) {
            return $this->erp()->name;
        }
        return $this->erp_other ? "Otro: {$this->erp_other}" : 'Ninguno';
    }

    public function posName()
    {
        if ($this->pos > 0) {
            return $this->pos()->name;
        }
        return $this->pos_other ? "Otro: {$this->pos_other}" : 'Ninguno';
    }

    public function devicesNames()
    {
        $devices = $this->devices == 1 ? __('app.lead.yes') : __('app.lead.no');
        if ($this->devices == 1) {
            $devices = nl2br($this->devices_current);
        }
        return $devices;
    }

    public function softwareName()
    {
        $software = $this->softs->map(function ($soft) {
            return Soft::find($soft)->name;
        })->implode(', ');
        if (! $software) {
            return 'Ninguno';
        }
        return $software;
    }
}
