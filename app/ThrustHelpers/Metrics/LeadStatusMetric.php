<?php


namespace App\ThrustHelpers\Metrics;

use App\Models\Lead;
use BadChoice\Thrust\Metrics\PartitionMetric;

class LeadStatusMetric extends PartitionMetric
{
    public function calculate()
    {
        return $this->count(Lead::class, 'status');
    }

    public function uriKey()
    {
        return 'lead-status';
    }
}
