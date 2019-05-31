<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Soft;
use App\Models\Product;

class LeadsController extends Controller
{
    public function show(Lead $lead)
    {
        return view('admin.leads.show', [
            "lead"              => $lead,
            "leadXefSofts"      => Soft::all()->where('product', Product::XEF)->groupBy("softType"),
            "leadRetailSofts"   => Soft::all()->where('product', Product::RETAIL)->groupBy("softType"),
        ]);
    }

    public function update(Lead $lead)
    {
        $lead->update(request()->all());
        return back()->withMessage('updated');
    }
}
