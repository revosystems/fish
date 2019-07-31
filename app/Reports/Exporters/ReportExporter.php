<?php

namespace App\Reports\Exporters;

use BadChoice\Reports\ReportExporter as BaseReportExporter;

abstract class ReportExporter extends BaseReportExporter
{
    protected $availableGroupedKeys = [];
    protected $groupBy;

    public function __construct($filters = null)
    {
        $this->groupBy = collect();
        parent::__construct($filters);
    }

    protected function isGrouped()
    {
        return $this->groupBy->intersect($this->availableGroupedKeys)->count() != 0;
    }

    protected function isGroupedBy($groupKeys)
    {
        return collect($groupKeys)->intersect($this->groupBy)->count() != 0;
    }
}
