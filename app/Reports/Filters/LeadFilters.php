<?php

namespace App\Reports\Filters;

use Illuminate\Support\Facades\DB;

class LeadFilters extends BaseFilters
{
    public $defaultSort         = 'leads.id';
    public $validSortFields     = ['id', 'product', 'name', 'surname1', 'surname2', 'email', 'phone', 'city', 'userName', 'trade_name', 'status', 'created_at', 'updated_at', 'quantity', 'total', 'total_devices'];
    protected $dateField        = 'leads.created_at';
    public $validTotalize       = ['status', 'user_id', 'product', 'type_segment', 'general_typology', 'property_spaces', 'property_franchise'];

    public function globalFilter()
    {
        return $this->builder->join("users", 'leads.user_id', '=', 'users.id')->select('leads.*',
            'users.name as userName'
        );
    }

    public function product($product = null)
    {
        return $this->where('leads.product', $product);
    }

    public function type_segment($typeSegment = null)
    {
        return $this->where('leads.type_segment', $typeSegment);
    }

    public function general_typology($generalTypology = null)
    {
        return $this->where('leads.general_typology', $generalTypology);
    }

    public function property_spaces($propertySpaces = null)
    {
        return $this->where('leads.property_spaces', $propertySpaces);
    }

    public function property_franchise($propertyFranchise = null)
    {
        return $this->where('leads.property_franchise', $propertyFranchise);
    }

    public function user_id($userId = null)
    {
        return $this->where('leads.user_id', $userId);
    }

    public function status($status = null)
    {
        return $this->where('leads.status', $status);
    }

    protected function selectGrouped()
    {
        return $this->builder->select('leads.*',
            'users.name as userName',
            DB::raw('sum(devices) as devices'),
            DB::raw('sum(total) as total'),
            DB::raw('sum(totalDevices) as totalDevices'),
            DB::raw('count(*) as quantity')
        );
    }
}
