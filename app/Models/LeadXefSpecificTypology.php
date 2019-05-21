<?php

namespace App\Models;

class LeadXefSpecificTypology
{
    public static function all()
    {
        return [
            1 => __('app.lead.carta'),
            2 => __('app.lead.events'),
            3 => __('app.lead.menu'),
        ];
    }
}