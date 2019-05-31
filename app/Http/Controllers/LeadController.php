<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\LeadPropertySpace;
use App\Models\LeadSoft;
use App\Models\TypeSegment;
use App\Models\Product;
use App\Models\PropertySpace;
use App\Models\Lead;
use App\Models\Proposal;

class LeadController extends Controller
{
    public function create()
    {
        return view('app.lead.create');
    }

    public function store(StoreLeadRequest $request)
    {
        try {
            $inputs = $this->requestSanitizedInputs($request);
            $lead   = Lead::create($inputs + ['user_id' => auth()->user()->id]);
            return  redirect()->route('lead.show', [$lead->id])->with('status', 'Lead creado OK');
        } catch (\Exception $e) {
            dd($e->getMessage());
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
                'lead'      => $lead,
                'proposals' => $proposals,
            ]);
        }
        
        return  redirect()->route('login');
    }

    public function download($leadId)
    {
        $lead               = Lead::findOrFail($leadId);
        $proposals          = $this->getProposals($lead);
        $revoVersionCss     = ($lead->product == Product::XEF) ? "xef" : "retail";
        $revoVersion        = ($lead->product == Product::XEF) ? "XEF" : "RETAIL";
        $revo_version_fname = ($lead->product == Product::XEF) ? "XEF" : "RETAIL";

        $hardware_retail = [ 'Caja & Display cliente', 'Caja móvil / autoventa', 'Payment', 'Balanzas y lectores', 'Almacén', 'Printers', 'Wifi' ];
        $hardware_xef    = [ 'Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ];
        $hardware        = ($lead->product == 1) ? $hardware_xef : $hardware_retail;

        $revoVersion .= " (" . TypeSegment::find($lead->type_segment)->name . ")";
        if ($lead->product == Product::XEF) {
            $franchise              = $lead->property_franchise ? __('app.lead.yes') : __('app.lead.noOwnLocal') ;
        } elseif ($lead->product == Product::RETAIL) {
            $franchise = $lead->type_segment == TypeSegment::RETAIL_SEGMENT_FRANCHISE ? __('app.lead.yes') : __('app.lead.no');
        }

        $pdf = \PDF::loadView('app.lead.pdf', [
            'product'                   => $lead->product,
            "revoVersionCss"            => $revoVersionCss,
            "revoVersion"               => $revoVersion,
            "lead"                      => $lead,
            "proposals"                 => $proposals,
            'hardware'                  => $hardware,
            'profile'                   => $revoVersion,
            'typology'                  => $lead->xefTypologyName(),
            'propertySpaces'            => $lead->propertySpaces->pluck('name')->implode(', '),
            'devices'                   => $this->devicesNames($lead),
            'retailSaleMode'            => $lead->retail_sale_mode ? __('app.lead.yes') : __('app.lead.no'),
            'retailSaleLocation'        => $lead->retail_sale_location ? __('app.lead.onLocal') : __('app.lead.onMobility'),
            'pos'                       => $lead->posName(),
            'franchise'                 => $franchise,
            'canUseAnotherPos'          => $this->can_use_another_pos ? __('app.lead.yes') : __('app.lead.no'),
            'erp'                       => $lead->erpName(),
            'software'                  => $lead->softwareName(),
            'xefPosCriticalQuantity'    => $lead->product == Product::XEF ? $lead->xef_pos_critical_quantity : null,
            'xefCashQuantity'           => $lead->product == Product::XEF ? $lead->xef_cash_quantity : null,
            'xefPrintersQuantity'       => $lead->product == Product::XEF ? $lead->xef_printers_quantity : null,
            'xefKds'                    => $lead->xef_kds == 1 ? "Sí, {$lead->xef_kds_quantity} pantallas" : "No",
            'xefPms'                    => $lead->xefPmsName()

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
        $proposals->push($lead->posType()->relatedProposal());
        $typologyProposals = $lead->generalTypology()->proposals();
        $proposals->push($typologyProposals->first());
        $proposals->push($lead->productProposal());
        if ($lead->propertySpaces()->whereIn('property_space', [PropertySpace::XEF_PROPERTY_SPACE_NO, PropertySpace::RETAIL_PROPERTY_SPACE_STANDARD])->count() == 0) {
            $proposals->push(Proposal::find(Proposal::PROFILES));
        }
        $typologyProposals->slice(1)->each(function ($relatedProposal) use ($proposals) {
            $proposals->push($relatedProposal);
        });
        $proposals->push(Proposal::find($lead->property_quantity > 1 ? Proposal::REVO_MASTER : Proposal::REVO_BACK));
        if ($lead->erp || $lead->erp_other) {
            $proposals->push(Proposal::find(Proposal::ERP));
        }
        if ($lead->xef_pms || $lead->pms_other) {
            $proposals->push(Proposal::find(Proposal::PMS));
        }

        // SOFT
        // TODO:: fix this;
//        $softCategoryTypes  = [];
//        $lead->soft()->each(function($soft) use ($proposals, $softCategoryTypes) {
//            if ($soft == "none") {
//                return;
//            }
//            if ($soft == "other") {
//                return $proposals->push(Proposal::find(Proposal::SOFT_OTHER));
//            }
//            $soft = LeadSoft::find($soft);
//            if (in_array($soft->softType, $softCategoryTypes)) {
//                return;
//            }
//
//            $softCategoryTypes[] = $soft->softType;
//            $proposals->push($soft->softType->relatedProposal);
//        });
        return $proposals->reject(null);
    }

    public function segments()
    {
        return TypeSegment::all()->where('product', request('value'))->map(function ($value, $key) {
            return "<option class='{$key}' value='{$key}' data-content=\"<div class='hideHint'>" . __('app.lead.type_segment') . " </div><div class='colored'>{$value['name']}</div>\">{$value['name']}</option>";
        })->implode('');
    }

    protected function requestSanitizedInputs(StoreLeadRequest $request)
    {
        $inputs = $request->except([
            'xef_general_typology',
            'retail_general_typology',
            'xef_property_spaces',
            'retail_property_spaces',
            'xef_property_quantity',
            'retail_property_quantity',
            'xef_property_capacity',
            'retail_property_capacity',
            'xef_soft',
            'retail_soft',
        ]);
        return array_merge($inputs, [
            "soft"              => $request->get('xef_soft') ? : $request->get('retail_soft'),
            "property_spaces"   => $request->get('xef_property_spaces') ? : $request->get('retail_property_spaces'),
            "property_quantity" => $request->get('xef_property_quantity') ? : $request->get('retail_property_quantity'),
            "general_typology"  => $request->get('xef_general_typology') ? : $request->get('retail_general_typology'),
            "property_capacity" => $request->get('xef_property_capacity') ? : $request->get('retail_property_capacity'),
        ]);
    }

    protected function getRequestPropertySpaces(StoreLeadRequest $request)
    {
        return collect($request->get('xef_property_spaces') ? : $request->get('retail_property_spaces'))->reject(null);
    }

    protected function getRequestSofts(StoreLeadRequest $request)
    {
        return collect($request->get('xef_soft') ? : $request->get('retail_soft'))->reject(null);
    }
}
