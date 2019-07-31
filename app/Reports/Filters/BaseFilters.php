<?php

namespace App\Reports\Filters;

use BadChoice\Reports\Filters\DefaultFilters;
use Illuminate\Support\Facades\DB;

class BaseFilters extends DefaultFilters
{
    public $defaultSort     = 'id';

    public function alreadyJoinedWith($table)
    {
        $query = $this->builder->getQuery();
        return $query->from == $table || (collect($query->joins)->pluck('table')->contains($table));
    }

    public function groupByDate($key = null)
    {
        if (! $key) {
            return $this->builder;
        }
        if ($key == "day") {
            return $this->builder->groupBy(DB::raw('date('. $this->dateField . ')'))  ->groupBy(DB::raw('month('. $this->dateField . ')'))  ->groupBy(DB::raw('year('. $this->dateField . ')'));
        }
        if ($key == "week") {
            return $this->builder->groupBy(DB::raw('week(' . $this->dateField. ', 3)')) ->groupBy(DB::raw('year('. $this->dateField . ')'));
        }
        if ($key == "month") {
            return $this->builder->groupBy(DB::raw('month('. $this->dateField . ')')) ->groupBy(DB::raw('year('. $this->dateField . ')'));
        }
        if ($key == "dayOfWeek") {
            return $this->builder->groupBy(DB::raw('dayofweek('. $this->dateField . ')'));
        }
        return $this->selectGrouped();
    }

    public function groupBy($keys = null)
    {
        if (! $keys || (count($keys) == 1 && $keys[0] === null)) {
            return $this->builder;
        }
        collect($keys)->each(function ($key) {
            return $this->groupByKey($key);
        });
        return $this->selectGrouped();
    }

    public function groupByKey($key)
    {
        return $this->builder->groupBy($key);
    }

    protected function selectGrouped()
    {
        return $this->builder;
    }
}
