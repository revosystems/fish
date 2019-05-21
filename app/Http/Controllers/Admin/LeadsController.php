<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadSoft;

class LeadsController extends Controller
{
    public function show(Lead $lead)
    {
        return view('admin.leads.show', [
            "lead"              => $lead,
            "leadXefSofts"      => LeadSoft::whereProduct(Lead::PRODUCT_XEF)->orderBy("name")->get()->groupBy("soft_type_id"),
            "leadRetailSofts"   => LeadSoft::whereProduct(Lead::PRODUCT_RETAIL)->orderBy("name")->get()->groupBy("soft_type_id"),
        ]);
    }

    public function update(Lead $lead)
    {
        $lead->update(request()->toArray());
        return back()->withMessage('updated');
    }
}
