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
        return view('admin.leads.show', compact('lead'));
    }

    public function update(Lead $lead)
    {
        $lead->update(request()->except('status'));
        if (request()->has('status') && request('status') != $lead->status) {
            $lead->updateStatus(auth()->user(), request('status'));
        }
        return back()->withMessage('updated');
    }

    public function showMore(Lead $lead)
    {
        return view('admin.leads.showMore', [
            "lead"              => $lead,
            "leadXefSofts"      => Soft::all()->where('product', Product::XEF)->groupBy("softType"),
            "leadRetailSofts"   => Soft::all()->where('product', Product::RETAIL)->groupBy("softType"),
        ]);
    }
}
