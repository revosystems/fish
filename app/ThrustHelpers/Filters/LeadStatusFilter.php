<?php


namespace App\ThrustHelpers\Filters;

use App\Models\Lead;
use BadChoice\Thrust\Filters\QueryBuilder;
use BadChoice\Thrust\Filters\SelectFilter;
use Illuminate\Http\Request;

class LeadStatusFilter extends SelectFilter
{
    public function apply(Request $request, $query, $value) {
        return $query->where('status', $value);
    }

    public function options() {
        return array_flip(Lead::availableStatus());
    }

}