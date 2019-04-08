<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Lead;

class LeadsStatusController extends Controller
{
    public function store(Lead $lead)
    {
//        $this->authorize('view', $lead);
        $leadStatus = $lead->updateStatus(auth()->user(), request('body'), request('new_status'));
        if (request()->hasFile('attachment')) {
            Attachment::storeAttachmentFromRequest(request(), $leadStatus);
        }
        return back();
    }
}