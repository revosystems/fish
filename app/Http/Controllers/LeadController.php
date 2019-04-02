<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\LeadPropertySpaces;
use App\LeadSoft;
use App\LeadSoftType;
use App\LeadTypesSegment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Lead;
use App\LeadDevice;
use App\LeadErp;
use App\LeadFranchisePosExternal;
use App\LeadPos;
use App\LeadProposal;
use App\LeadRetailSaleLocation;
use App\LeadRetailSaleMode;
use App\LeadRetailTypologyGeneral;
use App\LeadType;
use App\LeadXefKds;
use App\LeadXefPms;
use App\LeadXefPropertyFranchise;
use App\LeadXefTypologyGeneral;
use App\LeadXefTypologySpecific;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

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
        // CLIENT
            $lead_types                     = LeadType::all()->sortBy("ordern");
            $lead_xef_typology_general      = LeadXefTypologyGeneral::all()->sortBy("name");
            $lead_xef_typology_specific     = LeadXefTypologySpecific::all()->sortBy("ordern");
            $lead_retail_typology_general   = LeadRetailTypologyGeneral::all()->sortBy("name");
        // PROPERTY
            $lead_xef_property_franchise    = LeadXefPropertyFranchise::all()->sortBy("ordern");
            $lead_xef_property_spaces       = $lead_types->find(1)->spaces->sortBy("ordern");
            $lead_retail_property_spaces    = $lead_types->find(2)->spaces->sortBy("ordern");
        // CONFIGURATION
            $lead_devices                   = LeadDevice::all()->sortBy("ordern");
            $lead_xef_kds                   = LeadXefKds::all()->sortBy("ordern");
	        $lead_pos                       = LeadPos::all()->sortBy("name");
            $lead_retail_sale_mode          = LeadRetailSaleMode::all()->sortBy("ordern");
            $lead_retail_sale_location      = LeadRetailSaleLocation::all()->sortBy("ordern");
	        $lead_franchise_pos_external    = LeadFranchisePosExternal::all()->sortBy("ordern");
            $lead_xef_pms                   = LeadXefPms::all()->sortBy("name");
            $lead_erp                       = LeadErp::all()->sortBy("name");
            $lead_xef_soft                  = $lead_types->find(1)->software->sortBy("name")->groupBy("lead_soft_type_id");
            $lead_retail_soft               = $lead_types->find(2)->software->sortBy("name")->groupBy("lead_soft_type_id");

        return view('lead.create', compact([
            'lead_types',
            'lead_xef_typology_general',
            'lead_xef_typology_specific',
            'lead_retail_typology_general',
            'lead_xef_property_franchise',
            'lead_xef_property_spaces',
            'lead_retail_property_spaces',
            'lead_devices',
            'lead_xef_kds',
            'lead_pos',
            'lead_retail_sale_mode',
            'lead_retail_sale_location',
            'lead_franchise_pos_external',
            'lead_xef_pms',
            'lead_erp',
            'lead_xef_soft',
            'lead_retail_soft'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLeadRequest $request
     * @return \Illuminate\Http\Response
     */
	public function store(StoreLeadRequest $request)
	{
	   // dd(request());
        try {
            $inputs = $request->all();

            foreach ($inputs as $key => $value){
               if(is_array($value)){
                   $inputs[$key] = implode(",",array_filter($value));
               }
            }

            $lead = Lead::create($inputs + ['user_id' => Auth::id()]);
            return  redirect()->route('lead.show',[$lead->id])->with('status', 'Lead creado OK');
        }
        catch (\Exception $e) {
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
        $lead = Lead::findOrFail($id);
	    $proposals = $this->getProposals($lead);

	    if(Auth::id()===$lead->user_id){
            return view('lead.show')
                ->with('proposals', $proposals)
                ->with('type', $lead->type)
                ->with('trade_name', $lead->trade_name)
                ->with('id',$id);
        }
	    else{
            return  redirect()->route('login');
        }
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

	public function download($leadId){
        //CAOS. RENOMBRAR TABLAS A CONVENCION ELOQUENT. FORZADAS CONSULTAS REDUNDANTES

	    $lead = Lead::findOrFail($leadId);

	    $proposals = $this->getProposals($lead);
        $type = $lead->type;
        $revo_version_css = ($type==1) ? "xef" : "retail";
        $revo_version = ($type==1) ? "XEF" : "RETAIL";
        $revo_version_fname = ($type==1) ? "XEF" : "RETAIL";

        $hardware_retail = [ 'Caja & Display cliente', 'Caja móvil / autoventa', 'Payment', 'Balanzas y lectores', 'Almacén', 'Printers', 'Wifi' ];
        $hardware_xef = [ 'Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ];
        $hardware = ($type==1) ? $hardware_xef : $hardware_retail;

        $property_spaces = "";
        $property_staff_quantity = null;
        $retail_sale_mode = null;
        $retail_sale_location = null;
        $franchise_pos_external = null;
        $erp = null;
        $software = "";
        $softHasOther = 0;
        $softHasNone = 0;
        $xef_property_capacity = null;
        $xef_pos_critical_quantity = null;
        $xef_cash_quantity = null;
        $xef_printers_quantity = null;
        $xef_kds = null;
        $xef_pms = null;

        if($type == 1){
            $xef_dispositives = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers = $lead->xef_printers_quantity + ($lead->xef_kds == 1 ? $lead->xef_kds_quantity : 0);

//            $versionTtype = "basic";
//            if($xef_dispositives>1 || $xef_printers >2){ $versionTtype = "plus";
//                if($xef_dispositives>4 || $xef_printers >3){ $versionTtype = "pro"; }
//            }
//            $revo_version.=" ".$versionTtype." (".LeadTypesSegment::find($lead->type_segment)->name.")";
            $revo_version.=" (".LeadTypesSegment::find($lead->type_segment)->name.")";

            $typology = LeadXefTypologyGeneral::find($lead->xef_typology_general)->name;
            $typology.=" (".LeadXefTypologySpecific::find($lead->xef_typology_specific)->name.")";

            $property_quantity = $lead->xef_property_quantity;

            foreach (explode(",",$lead->xef_property_spaces) as $space){
                $property_spaces.=LeadPropertySpaces::find($space)->name.", ";
            }

            $franchise = LeadXefPropertyFranchise::find($lead->xef_property_franchise)->name;

            if($lead->xef_property_franchise==1){
                $franchise_pos_external = LeadFranchisePosExternal::find($lead->franchise_pos_external)->name;
            }

            $xef_property_capacity = $lead->xef_property_capacity;
            $xef_pos_critical_quantity = $lead->xef_pos_critical_quantity;
            $xef_cash_quantity = $lead->xef_cash_quantity;
            $xef_printers_quantity = $lead->xef_printers_quantity;

            $xef_kds = LeadXefKds::find($lead->xef_kds)->name;
            if($lead->xef_kds==1){
                $xef_kds.=", ".$lead->xef_kds_quantity." pantallas";
            }

            if($lead->xef_typology_general==7){

                if($lead->xef_pms==-1){
                    $xef_pms = "Otro: ".$lead->xef_pms_other;
                }
                else{
                    $xef_pms = LeadXefPms::find($lead->xef_pms)->name;
                }
            }

            foreach (explode(",",$lead->xef_soft) as $soft){
                if($soft!=""){
                    if($soft=="none"){
                        $softHasNone =1;
                    }
                    else{
                        if($soft=="other"){
                            $softHasOther =1;
                        }
                        else{
                            $software.=LeadSoft::find($soft)->name.", ";
                        }
                    }
                }
            }

            if($softHasOther==1){
                $software.="Otro: ".$lead->xef_soft_other.", ";
            }

            if($softHasNone==1){
                $software.="Ninguno, ";
            }
        }
        else if($type==2){
            $revo_version.=" (".LeadTypesSegment::find($lead->type_segment)->name.")";
            $typology = LeadRetailTypologyGeneral::find($lead->retail_typology_general)->name;
            $property_quantity = $lead->retail_property_quantity;

            foreach (explode(",",$lead->retail_property_spaces) as $space){
                $property_spaces.=LeadPropertySpaces::find($space)->name.", ";
            }

            $property_staff_quantity = $lead->retail_property_staff_quantity;

            $retail_sale_mode = LeadRetailSaleMode::find($lead->retail_sale_mode)->name;
            $retail_sale_location = LeadRetailSaleLocation::find($lead->retail_sale_location)->name;

            if($lead->type_segment==5){
                $franchise = "Sí";
            }
            else{
                $franchise = "No";
            }

            if($lead->type_segment==5){
                $franchise_pos_external = LeadFranchisePosExternal::find($lead->franchise_pos_external)->name;
            }

            foreach (explode(",",$lead->retail_soft) as $soft){
                if($soft!="") {
                    if ($soft == "none") {
                        $softHasNone = 1;
                    } else {
                        if ($soft == "other") {
                            $softHasOther = 1;
                        } else {
                            $software .= LeadSoft::find($soft)->name . ", ";
                        }
                    }
                }
            }

            if($softHasOther==1){
                $software.="Otro: ".$lead->retail_soft_other.", ";
            }

            if($softHasNone==1){
                $software.="Ninguno, ";
            }
        }

        $property_spaces = rtrim($property_spaces,", ");
        $software = rtrim($software,", ");

        $devices = LeadDevice::find($lead->devices)->name;
        if($lead->devices==1){
            $devices = nl2br($lead->devices_current);
        }

        if($lead->erp!="" && $lead->erp!=-1){
            $erp = LeadErp::find($lead->erp)->name;
        }

        if($lead->erp==-1){
            $erp.="Otro: ".$lead->erp_other;
        }

        $pos = LeadPos::find($lead->pos)->name;

        $pdf = \PDF::loadView('lead.pdf',[
            'type'             => $type,
            "revo_version_css" => $revo_version_css,
            "revo_version"      => $revo_version,
            "trade_name"        => $lead->trade_name,
            "client_name"       => $lead->name,
            "client_surname1"   => $lead->surname1,
            "client_surname2"   => $lead->surname2,
            "client_email"      => $lead->email,
            "client_phone"      => $lead->phone,
            "client_city"       => $lead->city,
            "proposals"         =>  $proposals,
            'hardware'          => $hardware,
            'profile'           => $revo_version,
            'typology'          => $typology,
            'property_qty'      => $property_quantity,
            'property_spaces'   => $property_spaces,
            'property_staff_quantity' => $property_staff_quantity,
            'devices'  => $devices,
            'retail_sale_mode' => $retail_sale_mode,
            'retail_sale_location' => $retail_sale_location,
            'pos' => $pos,
            'franchise' => $franchise,
            'franchise_pos_external' => $franchise_pos_external,
            'erp' => $erp,
            'software' => $software,
            'xef_property_capacity' => $xef_property_capacity,
            'xef_pos_critical_quantity' => $xef_pos_critical_quantity,
            'xef_cash_quantity' => $xef_cash_quantity,
            'xef_printers_quantity' =>$xef_printers_quantity,
            'xef_kds' =>$xef_kds,
            'xef_pms' => $xef_pms


        ]);

        $pdf->setOptions([
            'dpi'                   => 150,
            'defaultFont'           => 'sans-serif',
            'isHtml5ParserEnabled'  => true,
            'isRemoteEnabled'       => true
        ]);
        $pdf->setPaper("a4","landscape");

        return $pdf->download("Orange_Lead_".$revo_version_fname."_".date('Y_m_d_hia').".pdf");
    }

    /**
     * Get all proposals of the lead.
     *
     * @param $lead
     * @return array
     */
	public function getProposals($lead){
        $proposals = array();

        $type = $lead->type;

        // POS
        $related = LeadPos::find($lead->pos)->posType->related_proposal_id;
        array_push($proposals, LeadProposal::find($related));

        // PROFILE
        if($type == 1){
            $typology = LeadXefTypologyGeneral::find($lead->xef_typology_general);

            // HERO PROPOSAL
            array_push($proposals,LeadProposal::find($typology->lead_proposal_id));

            // VERSION
            $xef_proposal = 1; // BASIC
            $xef_dispositives = $lead->xef_pos_critical_quantity + $lead->xef_cash_quantity;
            $xef_printers = $lead->xef_printers_quantity + ($lead->xef_kds == 1 ? $lead->xef_kds_quantity : 0);

            if($xef_dispositives>1 || $xef_printers >2){ // PLUS
                $xef_proposal = 2;

                if($xef_dispositives>4 || $xef_printers >3){ // PRO
                    $xef_proposal = 3;
                }
            }
            array_push($proposals,LeadProposal::find($xef_proposal));
        }
        else if($type==2){
            $typology = LeadRetailTypologyGeneral::find($lead->retail_typology_general);

            // HERO PROPOSAL
            array_push($proposals,LeadProposal::find($typology->lead_proposal_id));

            // VERSION
            array_push($proposals,LeadProposal::find(4));
        }

        // PROFILES
        $spaces = array_merge(explode(",",$lead->xef_property_spaces),explode(",",$lead->retail_property_spaces));
        if(!in_array("1",array_filter($spaces)) &&  !in_array("4",array_filter($spaces))){
            array_push($proposals, LeadProposal::find(41));
        }

        // RELATED PROPOSALS
        $typology_related = explode(",",$typology->related_proposal_id);
        foreach ($typology_related as $typology){
            array_push($proposals,LeadProposal::find($typology));
        }

        // BACK-MASTER
        $back_proposal = ($lead->rxef_property_quantity>1 || $lead->retail_property_quantity>1) ? 7:6;
        array_push($proposals,LeadProposal::find($back_proposal));

        // ERP
        if($lead->erp!="" || $lead->erp_other!=""){
            array_push($proposals, LeadProposal::find(17));
        }

        // PMS
        if($lead->xef_pms!="" || $lead->pms_other!=""){
            array_push($proposals, LeadProposal::find(16));
        }

        // SOFT
        if($lead->xef_soft!="" || $lead->retail_soft!=""){
            $soft_cat_types = [];

            $software = ($type==1) ? explode(",",$lead->xef_soft) : explode(",",$lead->retail_soft);

            foreach ($software as $soft){
                if($soft!="other" && $soft!="none"){
                    $soft_type = LeadSoft::find($soft)->lead_soft_type_id;

                    if(!in_array($soft_type,$soft_cat_types)){
                        $soft_cat_types[]= $soft_type;

                        $related = LeadSoftType::find($soft_type)->related_proposal_id;
                        array_push($proposals,LeadProposal::find($related));
                    }
                }
                else{
                    if($soft=="other"){
                        array_push($proposals,LeadProposal::find(51));
                    }

                }
            }
        }

        return $proposals;
    }

    /**
     * Fetch the chained segments of main profile dropdown
     *
     * @param Request $request
     * @return void
     */

    public function fetchSegments(Request $request)
    {
        $value = $request->get("value");
        $data = LeadType::where('id', $value)->first();

        $output ='';
        foreach ($data->segments as $segment){
            $output .='<option class="'.$segment->class_helper.'" value="'.$segment->id.'" data-content="<div class=\'hideHint\'>'.__('app.lead.type_segment').' </div><div class=\'colored\'>'.$segment->name.' </div>">'.$segment->name.'</option>';
        }
        echo $output;
    }
}