<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadPropertySpaces;
use App\Models\LeadType;

class LeadsController extends Controller
{
    public function show(Lead $lead)
    {
        return view('admin.leads.show', [
            "lead"                          => $lead,
            "lead_xef_property_spaces"      => LeadPropertySpaces::whereType(LeadType::XEF)->get(),
            "lead_retail_property_spaces"   => LeadPropertySpaces::whereType(LeadType::RETAIL)->get(),
        ]);
    }

    public function update(Lead $lead)
    {
        $lead->update(array_only(request()->all(), [
            "type", "type_segment", "general_typology", "xef_specific_typology", 'surname1', 'surname2', 'trade_name', 'email', 'phone', 'city', 'property_quantity', 'xef_property_capacity', 'retail_property_staff_quantity', 'xef_pos_critical_quantity', 'xef_cash_quantity', 'xef_printers_quantity', 'xef_kds_quantity', 'xef_pms_other', 'erp_other', 'xef_soft_other', 'retail_soft_other',         ]));
//        $lead->update(request()->all());
        return back()->withMessage('updated');
    }
}