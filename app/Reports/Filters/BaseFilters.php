<?php

namespace App\Reports\Filters;

use BadChoice\Reports\Filters\DefaultFilters;

class BaseFilters extends DefaultFilters
{
    public $defaultSort     = 'id';

    public function alreadyJoinedWith($table)
    {
        $query = $this->builder->getQuery();
        return $query->from == $table || (collect($query->joins)->pluck('table')->contains($table));
    }
}
