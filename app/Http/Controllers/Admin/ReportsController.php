<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ThrustHelpers\Metrics\NewLeadsMetric;
use App\ThrustHelpers\Metrics\LeadStatusMetric;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports', ['metrics' => [
                new NewLeadsMetric,
                new LeadStatusMetric,
            ]
        ]);
    }
}
