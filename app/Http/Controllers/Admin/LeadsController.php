<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadType;

class LeadsController extends Controller
{
    public function show(Lead $lead)
    {
        $lead_types                     = LeadType::all()->sortBy("order");
        return view('admin.leads.show', [
            "lead"                          => $lead,
//            "lead_types"                    => $lead_types,
//            "lead_xef_typology_general"     => LeadXefTypologyGeneral::all()->sortBy("name"),
//            "lead_xef_typology_specific"    => LeadXefTypologySpecific::all()->sortBy("order"),
//            "lead_retail_typology_general"  => LeadRetailTypologyGeneral::all()->sortBy("name"),
//            // PROPERTY
//            "lead_xef_property_franchise"   => LeadXefPropertyFranchise::all()->sortBy("order"),
            "lead_xef_property_spaces"      => $lead_types->find(1)->spaces->sortBy("order"),
            "lead_retail_property_spaces"   => $lead_types->find(2)->spaces->sortBy("order"),
//            // CONFIGURATION
//            "lead_devices"                  => LeadDevice::all()->sortBy("order"),
//            "lead_xef_kds"                  => LeadXefKds::all()->sortBy("order"),
//            "lead_pos"                      => LeadPos::all()->sortBy("name"),
//            "lead_retail_sale_modes"        => LeadRetailSaleMode::all()->sortBy("order"),
//            "lead_retail_sale_locations"    => LeadRetailSaleLocation::all()->sortBy("order"),
//            "lead_franchise_pos_external"   => LeadFranchisePosExternal::all()->sortBy("order"),
//            "lead_xef_pms"                  => LeadXefPms::all()->sortBy("name"),
//            "lead_erp"                      => LeadErp::all()->sortBy("name"),
//            "lead_xef_soft"                 => $lead_types->find(1)->software->sortBy("name")->groupBy("lead_soft_type_id"),
//            "lead_retail_soft"              => $lead_types->find(2)->software->sortBy("name")->groupBy("lead_soft_type_id"),
        ]);
    }

    public function update(Lead $lead)
    {
        $lead->update(array_only(request()->all(), [
            "type", "type_segment", "xef_typology_general", "xef_typology_specific", "retail_typology_general",
            'surname1', 'surname2', 'trade_name', 'email', 'phone', 'city', 'xef_property_quantity', 'xef_property_capacity', 'retail_property_quantity', 'retail_property_staff_quantity', 'xef_pos_critical_quantity', 'xef_cash_quantity', 'xef_printers_quantity', 'xef_kds_quantity', 'xef_pms_other', 'erp_other', 'xef_soft_other', 'retail_soft_other',         ]));
//        $lead->update(request()->all());
        return back()->withMessage('updated');
    }
}