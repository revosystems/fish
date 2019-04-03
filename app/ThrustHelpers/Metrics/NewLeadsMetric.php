<?php

namespace App\ThrustHelpers\Metrics;

use App\Models\Lead;
use BadChoice\Thrust\Metrics\TrendMetric;

class NewLeadsMetric extends TrendMetric
{
    protected $cacheFor = 180;

    public function calculate()
    {
        return $this->countByDays(Lead::class);
    }

    public function uriKey()
    {
        return 'new-leads-metric';
    }
}
