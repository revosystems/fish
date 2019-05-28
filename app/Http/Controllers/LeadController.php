<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\LeadErp;
use App\Models\LeadPropertySpace;
use App\Models\LeadXefPms;
use App\Models\LeadSoft;
use App\Models\LeadTypesSegment;
use App\Models\LeadXefSpecificTypology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Lead;
use App\Models\LeadProposal;

class LeadController extends Controller
{
    public function create()
    {
        return view('app.lead.create.create', [
            "leadXefSofts"      => LeadSoft::types()->where('product', Lead::PRODUCT_XEF)->groupBy("softType"),
            "leadRetailSofts"   => LeadSoft::types()->where('product', Lead::PRODUCT_RETAIL)->groupBy("softType"),
        ]);
    }

    public function store(StoreLeadRequest $request)
    {
        try {
            $inputs = $this->requestSanitizedInputs($request);
//            $lead = Lead::create($inputs + ['user_id' => auth()->user()->id]);
            $lead = Lead::create($inputs + ['user_id' => auth()->user()->id]);
            collect($request->get('property_spaces'))->reject(null)->each(function ($propertySpace) use ($lead) {
                LeadPropertySpace::create([
                    "lead_id"           => $lead->id,
                    "property_space"    => $propertySpace,
                ]);
            });
            return  redirect()->route('lead.show', [$lead->id])->with('status', 'Lead creado OK');
        } catch (\Exception $e) {
            // TODO: remove this
            dd($e->getMessage());
            //$msg = $e->getMessage();
            $msg = __('app.errors.leadException');
            $request->session()->flash('exception', $msg);
            return  redirect()->back();
        }
    }

    public function show($id)
    {
        $lead      = Lead::findOrFail($id);
        $proposals = $this->getProposals($lead);
        if (auth()->user()->id == $lead->user_id) {
            return view('app.lead.show', [
                'id'        => $id,
                'proposals' => $proposals,
                'product'   => $lead->product,
                'trade_name'=> $lead->trade_name,
            ]);
        }
        
        return  redirect()->route('login');
    }

    public function download($leadId)
    {
        //CAOS. RENOMBRAR TABLAS A CONVENCION ELOQUENT. FORZADAS CONSULTAS REDUNDANTES
        $lead = Lead::findOrFail($leadId);

        $proposals          = $this->getProposals($lead);
        $product            = $lead->product;
        $revoVersionCss     = ($product == 1) ? "xef" : "retail";
        $revoVersion        = ($product == 1) ? "XEF" : "RETAIL";
        $revo_version_fname = ($product == 1) ? "XEF" : "RETAIL";

        $hardware_retail = [ 'Caja & Display cliente', 'Caja móvil / autoventa', 'Payment', 'Balanzas y lectores', 'Almacén', 'Printers', 'Wifi' ];
        $hardware_xef    = [ 'Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ];
        $hardware        = ($product == 1) ? $hardware_xef : $hardware_retail;

        $erp                       = null;
        $software                  = "";
        $softHasOther              = 0;
        $softHasNone               = 0;
        $xefPosCriticalQuantity    = null;
        $xefCashQuantity           = null;
        $xefPrintersQuantity       = null;

        $revoVersion .= " (" . array_collapse(LeadTypesSegment::all())[$lead->type_segment] . ")";
        $typology       = $lead->generalTypology->name;
        if ($product == Lead::PRODUCT_XEF) {
            $xef_dispositives = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers     = $lead->xef_printers_quantity + ($lead->xef_kds ? $lead->xef_kds_quantity : 0);

//            $versionTtype = "basic";
//            if($xef_dispositives>1 || $xef_printers >2){ $versionTtype = "plus";
//                if($xef_dispositives>4 || $xef_printers >3){ $versionTtype = "pro"; }
//            }
//            $revo_version.=" ".$versionTtype." ({$lead->typeSegment->name}")";

            $typology .= " (" . LeadXefSpecificTypology::all()[$lead->xef_specific_typology_id] . ")";
            $franchise = $lead->xef_property_franchise ? __('app.lead.yes') : __('app.lead.noOwnLocal') ;

            $xefPosCriticalQuantity = $lead->xef_pos_critical_quantity;
            $xefCashQuantity        = $lead->xef_cash_quantity;
            $xefPrintersQuantity    = $lead->xef_printers_quantity;
            foreach (explode(",", $lead->soft) as $soft) {
                if ($soft != "") {
                    if ($soft == "none") {
                        $softHasNone =1;
                    } else {
                        if ($soft == "other") {
                            $softHasOther =1;
                        } else {
                            $software .= LeadSoft::find($soft)->name.", ";
                        }
                    }
                }
            }

            if ($softHasOther == 1) {
                $software .= "Otro: {$lead->soft_other}, ";
            }

            if ($softHasNone == 1) {
                $software .= "Ninguno, ";
            }
        } elseif ($product == Lead::PRODUCT_RETAIL) {
            $franchise = $lead->type_segment == LeadTypesSegment::RETAIL_SEGMENT_FRANCHISE ? __('app.lead.yes') : __('app.lead.no');

            if ($softHasNone == 1) {
                $software .= "Ninguno, ";
            }
        }
        $software        = rtrim($software, ", ");

//        $devices = LeadDevice::find($lead->devices)->name;
        $devices = $lead->devices == 1 ? __('app.lead.yes') : __('app.lead.no');
        if ($lead->devices == 1) {
            $devices = nl2br($lead->devices_current);
        }

        if ($lead->erp && $lead->erp != -1) {
            $erp = LeadErp::all()[$lead->erp];
        }

        if ($lead->erp == -1) {
            $erp .= "Otro: {$lead->erp_other}";
        }

        if ($lead->pos == -1) {
            $pos = "Otro: {$lead->pos_other}";
        } elseif ($lead->pos == -2) {
            $pos = "Ninguno";
        } else {
            $pos = $lead->pos->name;
        }

        $pdf = \PDF::loadView('app.lead.pdf', [
            'product'                   => $product,
            "revoVersionCss"            => $revoVersionCss,
            "revoVersion"               => $revoVersion,
            "lead"                      => $lead,
            "proposals"                 => $proposals,
            'hardware'                  => $hardware,
            'profile'                   => $revoVersion,
            'typology'                  => $typology,
            'propertySpaces'            => $lead->propertySpaces->pluck('name')->implode(', '),
            'devices'                   => $devices,
            'retailSaleMode'            => $lead->retail_sale_mode ? __('app.lead.yes') : __('app.lead.no'),
            'retailSaleLocation'        => $lead->retail_sale_location ? __('app.lead.onLocal') : __('app.lead.onMobility'),
            'pos'                       => $pos,
            'franchise'                 => $franchise,
            'franchisePosExternal'      => $this->getFranchisePosExternal($lead),
            'erp'                       => $erp,
            'software'                  => $software,
            'xefPosCriticalQuantity'    => $xefPosCriticalQuantity,
            'xefCashQuantity'           => $xefCashQuantity,
            'xefPrintersQuantity'       => $xefPrintersQuantity,
            'xefKds'                    => $lead->xef_kds == 1 ? "Sí, {$lead->xef_kds_quantity} pantallas" : "No",
            'xefPms'                    => LeadXefPms::find($lead)

        ]);

        $pdf->setOptions([
            'dpi'                   => 150,
            'defaultFont'           => 'sans-serif',
            'isHtml5ParserEnabled'  => true,
            'isRemoteEnabled'       => true
        ]);
        $pdf->setPaper("a4", "landscape");

        return $pdf->download(ucwords(auth()->user()->getOrganizationName()) . "_Lead_{$revo_version_fname}_" . date('Y_m_d_hia') . ".pdf");
    }

    public function getProposals(Lead $lead)
    {
        $proposals = collect();
        // POS
        $proposals->push($lead->getRelatedProposal());
        // HERO PROPOSAL
        $proposals->push($lead->generalTypology->proposal);
        if ($lead->product == Lead::PRODUCT_XEF) {
            $xefProposal      = 1; // BASIC
            $xefDevices       = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers     = $lead->xef_printers_quantity + ($lead->xef_kds ? $lead->xef_kds_quantity : 0);
            if ($xefDevices > 1 || $xef_printers > 2) { // PLUS
                $xefProposal = 2;

                if ($xefDevices > 4 || $xef_printers > 3) { // PRO
                    $xefProposal = 3;
                }
            }
            $proposals->push(LeadProposal::find($xefProposal));
        } elseif ($lead->product == Lead::PRODUCT_RETAIL) {
            // VERSION
            $proposals->push(LeadProposal::find(4));
        }

        // PROFILES
        $spaces = explode(",", $lead->property_spaces);
        if (! in_array("1", array_filter($spaces)) && ! in_array("4", array_filter($spaces))) {
            $proposals->push(LeadProposal::find(41));
        }

        // RELATED PR
        //OPOSALS
        $lead->generalTypology->relatedProposals->each(function ($relatedProposal) use ($proposals) {
            $proposals->push($relatedProposal);
        });

        // BACK-MASTER
        $back_proposal = $lead->property_quantity > 1 ? 7 : 6;
        $proposals->push(LeadProposal::find($back_proposal));

        // ERP
        if ($lead->erp || $lead->erp_other) {
            $proposals->push(LeadProposal::find(17));
        }

        // PMS
        if ($lead->xef_pms || $lead->pms_other) {
            $proposals->push(LeadProposal::find(16));
        }

        // SOFT
        if ($lead->soft) {
            $softCategoryTypes  = [];
            $software           = explode(",", $lead->soft);
            $software->each(function ($soft) use ($proposals, $softCategoryTypes) {
                if ($soft == "none") {
                    return;
                }
                if ($soft == "other") {
                    return $proposals->push(LeadProposal::find(51));
                }
                $soft = LeadSoft::find($soft);
                if (in_array($soft->softType, $softCategoryTypes)) {
                    return;
                }

                $softCategoryTypes[] = $soft->softType;
                $proposals->push($soft->softType->relatedProposal);
            });
        }
        return $proposals->reject(null);
    }

    public function segments()
    {
        echo collect(LeadTypesSegment::byProduct(request('value')))->map(function ($value, $key) {
            return "<option class='{$key}' value='{$key}' data-content=\"<div class='hideHint'>" . __('app.lead.type_segment') . " </div><div class='colored'>{$value}</div>\">{$value}</option>";
        })->implode('');
    }

    protected function getFranchisePosExternal($lead)
    {
        if (! in_array($lead->type_segment, [LeadTypesSegment::RETAIL_SEGMENT_STORE, LeadTypesSegment::XEF_SEGMENT_SMALL])) {
            return $lead->franchise_pos_external ? __('app.lead.yes') : __('app.lead.no');
        }
        return null;
    }

    protected function requestSanitizedInputs(StoreLeadRequest $request)
    {
        $inputs = $request->except([
            'xef_property_spaces',
            'retail_property_spaces',
            'xef_property_quantity',
            'retail_property_quantity',
            'xef_property_capacity',
            'retail_property_capacity',
            'soft',
        ]);
        return array_merge($inputs, [
            "property_quantity" => $request->get('xef_property_quantity') ? : $request->get('retail_property_quantity'),
            "property_capacity" => $request->get('xef_property_capacity') ? : $request->get('retail_property_capacity'),
        ]);
    }
}
