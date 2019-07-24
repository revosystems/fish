<?php

namespace App\Reports;

use App\Reports\Filters\BaseFilters;

abstract class Report extends \BadChoice\Reports\Report
{
    /**
     * @var BaseFilters
     */
    public $filters;

    protected $exportFields     = ['id','created_at'];
}
