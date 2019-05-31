<?php


namespace App\ThrustHelpers\Filters;

use App\Models\Lead;
use App\Models\Status;
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
        return collect(Status::all())->mapWithKeys(function ($value, $key) {
            return [__("admin.{$value['name']}") => $key];
        });
    }
}
