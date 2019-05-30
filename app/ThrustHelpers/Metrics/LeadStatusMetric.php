<?php


namespace App\ThrustHelpers\Metrics;

use App\Models\Lead;
use App\Models\Status;
use BadChoice\Thrust\Metrics\PartitionMetric;

class LeadStatusMetric extends PartitionMetric
{
    public function calculate()
    {
        return $this->count(Lead::class, 'status')->names(function($lead){
            return ucFirst(Status::text($lead->status));
        });
    }

    public function uriKey()
    {
        return 'lead-status';
    }
}
