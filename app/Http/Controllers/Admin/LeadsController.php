<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class LeadsController extends Controller
{
    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact("lead"));
    }

    public function update(Lead $lead)
    {
        $lead->update(request()->toArray());
        return back()->withMessage('updated');
    }
}
