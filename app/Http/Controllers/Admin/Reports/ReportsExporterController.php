<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Reports\Filters\BaseFilters;
use App\Reports\ReportFactory;

class ReportsExporterController extends Controller
{
    public function xls($type)
    {
        return ReportFactory::reportFor($type)->export('xls');
    }

    public function csv($type)
    {
        return ReportFactory::reportFor($type)->export('csv');
    }

    protected function getFilterValue($key)
    {
        $filters = new BaseFilters(request());
        return $filters->filters()[$key] ?? null;
    }
}
