<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Reports\Filters\LeadFilters;
use App\Reports\LeadsReport;
use App\ThrustHelpers\Metrics\NewLeadsMetric;
use App\ThrustHelpers\Metrics\LeadStatusMetric;

class ReportsController extends Controller
{
    public function leads(LeadFilters $filters)
    {
//        dd((new LeadsReport)->paginate(25));
        return view('admin.reports.leads', [
            'title'     => trans_choice('admin.lead', 2),
            'filters'    => $filters,
            'data'      => (new LeadsReport)->paginate(25),
        ]);
    }
}
