<?php


namespace App\ThrustHelpers\Filters;

use App\Models\Lead;
use BadChoice\Thrust\Filters\SelectFilter;
use Illuminate\Http\Request;

class LeadStatusFilter extends SelectFilter
{
    public function apply(Request $request, $query, $value)
    {
        return $query->where('status', $value);
    }

    public function options()
    {
        return collect(Lead::availableStatus())->flip()->mapWithKeys(function ($key, $status) {
            return [__("admin.{$status}") => $key];
        });
    }
}
