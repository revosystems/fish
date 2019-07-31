<?php

namespace App\Reports;


use App\Models\Lead;
use App\Reports\Exporters\LeadExporter;
use App\Reports\Filters\LeadFilters;

class LeadsReport extends Report
{
    protected $filtersClass     = LeadFilters::class;
    protected $reportExporter   = LeadExporter::class;

    public function query($parent_id = null)
    {
        return Lead::filter($this->getFilters($parent_id));
    }
}
