<?php

namespace App\Reports\Filters;

use Illuminate\Support\Facades\DB;

class LeadFilters extends BaseFilters
{
    public $defaultSort         = 'leads.id';
    public $validSortFields     = ['id', 'name', 'userName', 'status', 'created_at', 'updated_at'];
    protected $dateField        = 'leads.created_at';
    public $validTotalize       = ['day', 'dayAndUser', 'dayOfWeek', 'week', 'month', 'monthAndUser', 'status', 'user'];

    public function globalFilter()
    {
        return $this->builder->join("users", 'leads.user_id', '=', 'users.id')->select('leads.*',
            'users.name as userName'
        );
    }

    public function totalize($key = null)
    {
        if ($key == null) {
            return $this->builder;
        }
        return $this->groupBy($key)
            ->select('leads.*',
                'users.name as userName',
                DB::raw('count(*) as quantity')
            );
    }

    public function user($userId = null)
    {
        return $this->where('leads.user_id', $userId);
    }

    public function product($product = null)
    {
        return $this->where('leads.product', $product);
    }

    public function groupBy($key)
    {
        if ($key == "day") {
            return $this->builder->groupBy(DB::raw('date('. $this->dateField . ')'))  ->groupBy(DB::raw('month('. $this->dateField . ')'))  ->groupBy(DB::raw('year('. $this->dateField . ')'))->orderBy($this->dateField);
        }
        if ($key == 'dayAndUser') {
            return $this->builder->groupBy(DB::raw('date(' . $this->dateField. ')'))->groupBy(DB::raw('month(' . $this->dateField . ')'))->groupBy(DB::raw('year(' . $this->dateField . ')'))->groupBy(DB::raw('user_id'));
        }
        if ($key == "week") {
            return $this->builder->groupBy(DB::raw('week(' . $this->dateField. ', 3)')) ->groupBy(DB::raw('year('. $this->dateField . ')'))   ->orderBy($this->dateField);
        }
        if ($key == "month") {
            return $this->builder->groupBy(DB::raw('month('. $this->dateField . ')')) ->groupBy(DB::raw('year('. $this->dateField . ')'))   ->orderBy($this->dateField);
        }
        if ($key == 'monthAndUser') {
            return $this->builder->groupBy(DB::raw('month(' . $this->dateField . ')'))->groupBy(DB::raw('year(' . $this->dateField . ')'))->groupBy(DB::raw('user_id'));
        }
        if ($key == "dayOfWeek") {
            return $this->builder->groupBy(DB::raw('dayofweek('. $this->dateField . ')'))                                             ->orderBy($this->dateField);
        }
        if ($key == "user") {
            return $this->builder->groupBy(DB::raw('user_id'));
        }
        if ($key == "status") {
            return $this->builder->groupBy(DB::raw('status'));
        }

        return $this->builder;
    }

}
