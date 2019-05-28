<?php

namespace App\Models;

class LeadTypesSegment
{
    const XEF_SEGMENT_SMALL         = 'dep_xef_small';
    const XEF_SEGMENT_MEDIUM        = 'dep_xef_medium';
    const XEF_SEGMENT_LARGE         = 'dep_xef_large';
    const RETAIL_SEGMENT_STORE      = 'dep_retail_store';
    const RETAIL_SEGMENT_FRANCHISE  = 'dep_retail_franchise';

    public static function all()
    {
        return [
            Lead::PRODUCT_XEF    => [
                static::XEF_SEGMENT_SMALL           => __('admin.small'),
                static::XEF_SEGMENT_MEDIUM          => __('admin.medium'),
                static::XEF_SEGMENT_LARGE           => __('admin.large'),
            ],
            Lead::PRODUCT_RETAIL => [
                static::RETAIL_SEGMENT_STORE        => __('admin.store'),
                static::RETAIL_SEGMENT_FRANCHISE    => __('admin.chainOrFranchise'),
            ]
        ];
    }
    
    public static function byProduct($product)
    {
        return static::all()[$product] ?? [];
    }

    public static function htmlClasses($product = null)
    {
        if (! $product) {
            return implode(' ', array_keys(array_collapse(LeadTypesSegment::all())));
        }
        return implode(' ', array_keys(LeadTypesSegment::byProduct($product)));
    }
}
