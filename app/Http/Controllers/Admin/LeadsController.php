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
            "leadXefSofts"      => LeadSoft::types()->where('product', Lead::PRODUCT_XEF)->groupBy("softType"),
            "leadRetailSofts"   => LeadSoft::types()->where('product', Lead::PRODUCT_RETAIL)->groupBy("softType"),
        ]);
    }

    public function update(Lead $lead)
    {
        $lead->update(request()->toArray());
        return back()->withMessage('updated');
    }
}
