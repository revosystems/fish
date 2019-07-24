<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\ThrustHelpers\Metrics\NewLeadsMetric;
use App\ThrustHelpers\Metrics\LeadStatusMetric;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.reports.dashboard', ['metrics' => [
                new NewLeadsMetric,
                new LeadStatusMetric,
            ]
        ]);
    }
}
