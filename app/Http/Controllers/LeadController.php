<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\LeadPropertySpaces;
use App\Models\LeadSoft;
use App\Models\LeadTypesSegment;
use App\Models\LeadXefSpecificTypology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Lead;
use App\Models\LeadProposal;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.lead.create.create', [
            "leadXefSofts"      => LeadSoft::whereProduct(Lead::PRODUCT_XEF)->orderBy("name")->get()->groupBy("soft_type_id"),
            "leadRetailSofts"   => LeadSoft::whereProduct(Lead::PRODUCT_RETAIL)->orderBy("name")->get()->groupBy("soft_type_id"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLeadRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeadRequest $request)
    {
        try {
            $inputs = $this->getRequestSanitizedInputs($request);
            foreach ($inputs as $key => $value) {
                if (is_array($value)) {
                    // TODO create relations
                    $inputs[$key] = implode(",", array_filter($value));
                }
            }

            $lead = Lead::create($inputs + ['user_id' => Auth::id()]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead      = Lead::findOrFail($id);
        $proposals = $this->getProposals($lead);
        if (auth()->user()->id == $lead->user_id) {
            return view('app.lead.show', [
                'id'        =>  $id,
                'proposals' =>  $proposals,
                'product'   =>  $lead->product,
                'trade_name'=>  $lead->trade_name,
            ]);
        }
        
        return  redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Generate & download pdf of the specified lead.
     *
     * @param $leadId
     * @return \Illuminate\Http\Response
     */
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

        $propertyStaffQuantity     = null;
        $erp                       = null;
        $software                  = "";
        $softHasOther              = 0;
        $softHasNone               = 0;
        $xefPropertyCapacity       = null;
        $xefPosCriticalQuantity    = null;
        $xefCashQuantity           = null;
        $xefPrintersQuantity       = null;
        $xefPms                    = null;

        $revoVersion .= " (" . array_collapse(LeadTypesSegment::segments())[$lead->type_segment] . ")";
        $typology       = $lead->generalTypology->name;
//        $propertySpaces    = $lead->propertySpaces->map(function ($space) {
//            return LeadPropertySpaces::find($space)->name;
//        })->implode(', ');
        if ($product == 1) {
            $propertySpaces = collect(explode(",", $lead->xef_property_spaces))->map(function ($space) {
                return LeadPropertySpaces::find($space)->name;
            })->implode(', ');
            $xef_dispositives = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers     = $lead->xef_printers_quantity + ($lead->xef_kds ? $lead->xef_kds_quantity : 0);

//            $versionTtype = "basic";
//            if($xef_dispositives>1 || $xef_printers >2){ $versionTtype = "plus";
//                if($xef_dispositives>4 || $xef_printers >3){ $versionTtype = "pro"; }
//            }
//            $revo_version.=" ".$versionTtype." ({$lead->typeSegment->name}")";

            $typology .= " (" . LeadXefSpecificTypology::all()[$lead->xef_specific_typology_id] . ")";
            $franchise = $lead->xef_property_franchise ? __('app.lead.yes') : __('app.lead.noOwnLocal') ;

            $xefPropertyCapacity     = $lead->xef_property_capacity;
            $xefPosCriticalQuantity  = $lead->xef_pos_critical_quantity;
            $xefCashQuantity         = $lead->xef_cash_quantity;
            $xefPrintersQuantity     = $lead->xef_printers_quantity;

            if ($lead->generalTypology->name == "Hotel") {
                if ($lead->xef_pms == -1) {
                    $xefPms = "Otro: {$lead->xef_pms_other}";
                } else {
                    $xefPms = $lead->xefPms->name;
                }
            }

            foreach (explode(",", $lead->xef_soft) as $soft) {
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
                $software .= "Otro: {$lead->xef_soft_other}, ";
            }

            if ($softHasNone == 1) {
                $software .= "Ninguno, ";
            }
        } elseif ($product == 2) {
            $propertySpaces = collect(explode(",", $lead->retail_property_spaces))->map(function ($space) {
                return LeadPropertySpaces::find($space)->name;
            })->implode(', ');
            $propertyStaffQuantity = $lead->retail_property_staff_quantity;
            $franchise = $lead->type_segment == LeadTypesSegment::RETAIL_SEGMENT_FRANCHISE ? __('app.lead.yes') : __('app.lead.no');

            foreach (explode(",", $lead->retail_soft) as $soft) {
                if (! $soft) {
                    continue;
                }
                if ($soft == "none") {
                    $softHasNone = 1;
                    continue;
                }
                if ($soft == "other") {
                    $softHasOther = 1;
                    continue;
                }
                $software .= LeadSoft::find($soft)->name . ", ";
            }

            if ($softHasOther == 1) {
                $software .= "Otro: ".$lead->retail_soft_other.", ";
            }

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

        if ($lead->erp_id && $lead->erp_id != -1) {
            $erp = $lead->erp->name;
        }

        if ($lead->erp_id == -1) {
            $erp .= "Otro: {$lead->erp_other}";
        }

        if ($lead->pos_id == -1) {
            $pos = "Otro: {$lead->pos_other}";
        }
        else if ($lead->pos_id == -2) {
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
            'propertySpaces'            => $propertySpaces,
            'propertyStaffQuantity'     => $propertyStaffQuantity,
            'devices'                   => $devices,
            'retailSaleMode'            => $lead->retail_sale_mode ? __('app.lead.yes') : __('app.lead.no'),
            'retailSaleLocation'        => $lead->retail_sale_location ? __('app.lead.onLocal') : __('app.lead.onMobility'),
            'pos'                       => $pos,
            'franchise'                 => $franchise,
            'franchisePosExternal'      => $this->getFranchisePosExternal($lead),
            'erp'                       => $erp,
            'software'                  => $software,
            'xefPropertyCapacity'       => $xefPropertyCapacity,
            'xefPosCriticalQuantity'    => $xefPosCriticalQuantity,
            'xefCashQuantity'           => $xefCashQuantity,
            'xefPrintersQuantity'       => $xefPrintersQuantity,
            'xefKds'                    => $lead->xef_kds == 1 ? "Sí, {$lead->xef_kds_quantity} pantallas" : "No",
            'xefPms'                    => $xefPms
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

    /**
     * Get all proposals of the lead.
     *
     * @param $lead
     * @return array
     */
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
        $spaces = array_merge(explode(",", $lead->xef_property_spaces), explode(",", $lead->retail_property_spaces));
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
        if ($lead->erp_id || $lead->erp_other) {
            $proposals->push(LeadProposal::find(17));
        }

        // PMS
        if ($lead->xef_pms_id || $lead->pms_other) {
            $proposals->push(LeadProposal::find(16));
        }

        // SOFT
        if ($lead->xef_soft || $lead->retail_soft) {
            $softCategoryTypes  = [];
            $software           = collect(($lead->product == Lead::PRODUCT_XEF) ? explode(",", $lead->xef_soft) : explode(",", $lead->retail_soft));
            $software->each(function ($soft) use ($proposals, $softCategoryTypes) {
                if ($soft == "none")    return;
                if ($soft == "other")   return $proposals->push(LeadProposal::find(51));
                $soft = LeadSoft::find($soft);
                if (in_array($soft->soft_type_id, $softCategoryTypes)) return;

                $softCategoryTypes[] = $soft->soft_type_id;
                $proposals->push($soft->softType->relatedProposal);
            });
        }
        return $proposals->reject(null);
    }

    /**
     * Fetch the chained segments of main profile dropdown
     *
     * @param Request $request
     * @return void
     */
    public function fetchSegments()
    {
        echo collect(LeadTypesSegment::byProduct(request('value')))->map(function ($value, $key) {
            return "<option class='{$key}' value='{$key}' data-content=\"<div class='hideHint'>" . __('app.lead.type_segment') . " </div><div class='colored'>{$value}</div>\">{$value}</option>";
        })->implode('');
    }

    private function getRequestSanitizedInputs(StoreLeadRequest $request)
    {
        $inputs = $request->except([
            'xef_general_typology_id',
            'retail_general_typology_id',
            'xef_property_quantity',
            'retail_property_quantity',
        ]);
        return array_merge($inputs, [
            "general_typology_id"   => $request->get('xef_general_typology_id') ?: $request->get('retail_general_typology_id'),
            "property_quantity"     => $request->get('xef_property_quantity') ? : $request->get('retail_property_quantity')
        ]);
    }

    protected function getFranchisePosExternal($lead)
    {
        if (in_array($lead->type_segment, [LeadTypesSegment::RETAIL_SEGMENT_FRANCHISE, LeadTypesSegment::XEF_SEGMENT_SMALL])) {
            return $lead->franchise_pos_external ? __('app.lead.yes') : __('app.lead.no');
        }
        return null;
    }
}
