<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\LeadPropertySpaces;
use App\Models\LeadSoft;
use App\Models\LeadSoftType;
use App\Models\LeadTypesSegment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Lead;
use App\Models\LeadDevice;
use App\Models\LeadProposal;
use App\Models\LeadGeneralTypology;

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
        return view('app.lead.create', [
            "leadXefGeneralTypologies"      => LeadGeneralTypology::whereType(Lead::TYPE_XEF)->orderBy("name")->get(),
            "leadRetailGeneralTypologies"   => LeadGeneralTypology::whereType(Lead::TYPE_RETAIL)->orderBy("name")->get(),
            "leadXefPropertySpaces"         => LeadPropertySpaces::whereType(Lead::TYPE_XEF)->get(),
            "leadRetailPropertySpaces"      => LeadPropertySpaces::whereType(Lead::TYPE_RETAIL)->get(),
            "leadXefSofts"                  => LeadSoft::whereType(Lead::TYPE_XEF)->orderBy("name")->get()->groupBy("soft_type_id"),
            "leadRetailSofts"               => LeadSoft::whereType(Lead::TYPE_RETAIL)->orderBy("name")->get()->groupBy("soft_type_id"),
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
        if (Auth::id() === $lead->user_id) {
            return view('app.lead.show')
                ->with('proposals', $proposals)
                ->with('type', $lead->type)
                ->with('trade_name', $lead->trade_name)
                ->with('id', $id);
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
        $type               = $lead->type;
        $revoVersionCss     = ($type == 1) ? "xef" : "retail";
        $revoVersion        = ($type == 1) ? "XEF" : "RETAIL";
        $revo_version_fname = ($type == 1) ? "XEF" : "RETAIL";

        $hardware_retail = [ 'Caja & Display cliente', 'Caja móvil / autoventa', 'Payment', 'Balanzas y lectores', 'Almacén', 'Printers', 'Wifi' ];
        $hardware_xef    = [ 'Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ];
        $hardware        = ($type == 1) ? $hardware_xef : $hardware_retail;

        $propertyStaffQuantity     = null;
        $retailSaleMode            = null;
        $retailSaleLocation        = null;
        $franchisePosExternal      = null;
        $erp                       = null;
        $software                  = "";
        $softHasOther              = 0;
        $softHasNone               = 0;
        $xefPropertyCapacity       = null;
        $xefPosCriticalQuantity    = null;
        $xefCashQuantity           = null;
        $xefPrintersQuantity       = null;
        $xefKds                    = null;
        $xefPms                    = null;

        $revoVersion .= " ({$lead->typeSegment->name})";
        $typology       = $lead->generalTypology->name;
//        $propertySpaces    = $lead->propertySpaces->map(function ($space) {
//            return LeadPropertySpaces::find($space)->name;
//        })->implode(', ');
        if ($type == 1) {
            $propertySpaces = collect(explode(",", $lead->xef_property_spaces))->map(function ($space) {
                return LeadPropertySpaces::find($space)->name;
            })->implode(', ');
            $xef_dispositives = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers     = $lead->xef_printers_quantity + ($lead->xef_kds == 1 ? $lead->xef_kds_quantity : 0);

//            $versionTtype = "basic";
//            if($xef_dispositives>1 || $xef_printers >2){ $versionTtype = "plus";
//                if($xef_dispositives>4 || $xef_printers >3){ $versionTtype = "pro"; }
//            }
//            $revo_version.=" ".$versionTtype." ({$lead->typeSegment->name}")";

            $typology .= " ({$lead->xefSpecificTypology->name})";
            $franchise = $lead->xefPropertyFranchise->name;

            if ($lead->xef_property_franchise == 1) {
                $franchisePosExternal = $lead->franchisePosExternal->name;
            }

            $xefPropertyCapacity     = $lead->xef_property_capacity;
            $xefPosCriticalQuantity  = $lead->xef_pos_critical_quantity;
            $xefCashQuantity         = $lead->xef_cash_quantity;
            $xefPrintersQuantity     = $lead->xef_printers_quantity;

            $xefKds = $lead->xefKds->name;
            if ($lead->xef_kds == 1) {
                $xefKds .= ", {$lead->xef_kds_quantity} pantallas";
            }

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
        } elseif ($type == 2) {
            $propertySpaces = collect(explode(",", $lead->retail_property_spaces))->map(function ($space) {
                return LeadPropertySpaces::find($space)->name;
            })->implode(', ');
            $propertyStaffQuantity = $lead->retail_property_staff_quantity;

            $retailSaleMode     = $lead->retail_sale_mode->name;
            $retailSaleLocation = $lead->retail_sale_location->name;

            if ($lead->type_segment_id == 5) {
                $franchise = "Sí";
            } else {
                $franchise = "No";
            }

            if ($lead->type_segment_id == 5) {
                $franchisePosExternal = $lead->franchise_pos_external->name;
            }

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

        $devices = LeadDevice::find($lead->devices)->name;
        if ($lead->devices == 1) {
            $devices = nl2br($lead->devices_current);
        }

        if ($lead->erp_id && $lead->erp_id != -1) {
            $erp = $lead->erp->name;
        }

        if ($lead->erp_id == -1) {
            $erp .= "Otro: {$lead->erp_other}";
        }

        if($lead->pos_id==-1){
            $pos = "Otro: ".$lead->pos_other;
        }
        else if($lead->pos_id==-2){
            $pos = "Ninguno";
        }
        else{
            $pos = $lead->pos->name;
        }

        $pdf = \PDF::loadView('app.lead.pdf', [
            'type'                      => $type,
            "revoVersionCss"            => $revoVersionCss,
            "revoVersion"               => $revoVersion,
            "tradeName"                 => $lead->trade_name,
            "clientName"                => $lead->name,
            "clientSurname1"            => $lead->surname1,
            "clientSurname2"            => $lead->surname2,
            "clientEmail"               => $lead->email,
            "clientPhone"               => $lead->phone,
            "clientCity"                => $lead->city,
            "proposals"                 => $proposals,
            'hardware'                  => $hardware,
            'profile'                   => $revoVersion,
            'typology'                  => $typology,
            'propertyQty'               => $lead->property_quantity,
            'propertySpaces'            => $propertySpaces,
            'propertyStaffQuantity'     => $propertyStaffQuantity,
            'devices'                   => $devices,
            'retailSaleMode'            => $retailSaleMode,
            'retailSaleLocation'        => $retailSaleLocation,
            'pos'                       => $pos,
            'franchise'                 => $franchise,
            'franchisePosExternal'      => $franchisePosExternal,
            'erp'                       => $erp,
            'software'                  => $software,
            'xefPropertyCapacity'       => $xefPropertyCapacity,
            'xefPosCriticalQuantity'    => $xefPosCriticalQuantity,
            'xefCashQuantity'           => $xefCashQuantity,
            'xefPrintersQuantity'       => $xefPrintersQuantity,
            'xefKds'                    => $xefKds,
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
        if ($lead->type == Lead::TYPE_XEF) {
            $xefProposal      = 1; // BASIC
            $xefDevices       = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers     = $lead->xef_printers_quantity + ($lead->xef_kds == 1 ? $lead->xef_kds_quantity : 0);
            if ($xefDevices > 1 || $xef_printers > 2) { // PLUS
                $xefProposal = 2;

                if ($xefDevices > 4 || $xef_printers > 3) { // PRO
                    $xefProposal = 3;
                }
            }
            $proposals->push(LeadProposal::find($xefProposal));
        } elseif ($lead->type == Lead::TYPE_RETAIL) {
            // VERSION
            $proposals->push(LeadProposal::find(4));
        }

        // PROFILES
        $spaces = array_merge(explode(",", $lead->xef_property_spaces), explode(",", $lead->retail_property_spaces));
        if (! in_array("1", array_filter($spaces)) && ! in_array("4", array_filter($spaces))) {
            $proposals->push(LeadProposal::find(41));
        }

        // RELATED PROPOSALS
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
            $soft_cat_types = [];
            $software       = ($lead->type == 1) ? explode(",", $lead->xef_soft) : explode(",", $lead->retail_soft);
            foreach ($software as $soft) {
                if ($soft != "other" && $soft != "none") {
                    $soft_type = LeadSoft::find($soft)->soft_type_id;

                    if (! in_array($soft_type, $soft_cat_types)) {
                        $soft_cat_types[]= $soft_type;

                        $proposals->push(LeadSoftType::find($soft_type)->relatedProposal);
                    }
                } else {
                    if ($soft == "other") {
                        $proposals->push(LeadProposal::find(51));
                    }
                }
            }
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
        echo LeadTypesSegment::whereType(request('value'))->get()->reduce(function ($carry, $segment) {
            return $carry . '<option class="'.$segment->class_helper.'" value="'.$segment->id.'" data-content="<div class=\'hideHint\'>'.__('app.lead.type_segment').' </div><div class=\'colored\'>'.$segment->name.' </div>">'.$segment->name.'</option>';
        });
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
}
