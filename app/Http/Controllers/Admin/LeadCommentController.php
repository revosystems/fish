<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Lead;

class LeadCommentController extends Controller
{
    public function store(Lead $lead)
    {
        $leadStatus = $lead->addComment(auth()->user(), request('body'));
        if (request()->hasFile('attachment')) {
            Attachment::storeAttachmentFromRequest(request(), $leadStatus);
        }
        return back();
    }
}