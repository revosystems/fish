<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use Taggable;
    use SoftDeletes;

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

    public function xefSpecificTypologies()
    {
        return $this->hasMany(LeadXefSpecificTypology::class);
    }

    public function softs()
    {
        return $this->hasMany(LeadSoft::class);
    }

    public function statusUpdates()
    {
        return $this->hasMany(LeadStatusUpdate::class)->latest();
    }

    public function propertySpace()
    {
        return PropertySpace::find($this->property_spaces);
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

    public function hardware()
    {
        if ($this->product == Product::XEF) {
            return ['Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ];
        }
        return ['Caja & Display cliente', 'Caja móvil / autoventa', 'Payment', 'Balanzas y lectores', 'Almacén', 'Printers', 'Wifi'];
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
        return Proposal::find($this->xefProposal());
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
        return  "{$this->generalTypology()->name} (" . $this->xefSpecificTypologyNames() . ")";
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

    public function xefSpecificTypologyNames()
    {
        return $this->xefSpecificTypologies->map(function ($leadTypology) {
            return XefSpecificTypology::find($leadTypology->xef_specific_typology)->name;
        })->implode(', ');
    }

    public function softwareNames()
    {
        return $this->softs->map(function ($leadSoft) {
            if ($leadSoft->soft == -1) {
                return $this->soft_other;
            }
            return Soft::find($leadSoft->soft)->name;
        })->implode(', ');
    }

    public function proposals()
    {
        $proposals = collect();
        $proposals->push($this->posType()->proposal());
        $typologyProposals = $this->generalTypology()->proposals();
        $proposals->push($typologyProposals->first());
        $proposals->push($this->productProposal());
        if ($this->propertySpace()->needProfiles()) {
            $proposals->push(Proposal::find(Proposal::PROFILES));
        }
        $typologyProposals->slice(1)->each(function ($proposal) use ($proposals) {
            $proposals->push($proposal);
        });
        $proposals->push(Proposal::find($this->property_quantity > 1 ? Proposal::REVO_MASTER : Proposal::REVO_BACK));
        if ($this->erp || $this->erp_other) {
            $proposals->push(Proposal::find(Proposal::ERP));
        }
        if ($this->xef_pms || $this->pms_other) {
            $proposals->push(Proposal::find(Proposal::PMS));
        }

        if ($this->erp || $this->erp_other) {
            $proposals->push(Proposal::find(Proposal::ERP));
        }

        if ($this->soft > 0) {
            $proposals->push(Proposal::find($this->soft()->softType()->proposal()));
        } elseif ($this->soft_other) {
            $proposals->push(Proposal::find(Proposal::SOFT_OTHER));
        }
        return $proposals->reject(null);
    }
}
