<?php

namespace App\Models;

class TypeSegment extends FishDataBase
{
    const XEF_SEGMENT_SMALL         = 'dep_xef_small';
    const XEF_SEGMENT_MEDIUM        = 'dep_xef_medium';
    const XEF_SEGMENT_LARGE         = 'dep_xef_large';
    const RETAIL_SEGMENT_STORE      = 'dep_retail_store';
    const RETAIL_SEGMENT_FRANCHISE  = 'dep_retail_franchise';

    public static function all()
    {
        return collect([
            static::XEF_SEGMENT_SMALL           => ['product' => Product::XEF, 'name' => __('admin.small')],
            static::XEF_SEGMENT_MEDIUM          => ['product' => Product::XEF, 'name' => __('admin.medium')],
            static::XEF_SEGMENT_LARGE           => ['product' => Product::XEF, 'name' => __('admin.large')],
            static::RETAIL_SEGMENT_STORE        => ['product' => Product::RETAIL, 'name' => __('admin.store')],
            static::RETAIL_SEGMENT_FRANCHISE    => ['product' => Product::RETAIL, 'name' => __('admin.chainOrFranchise')],
        ]);
    }
    
    public static function htmlClasses($product = null)
    {
        if (! $product) {
            return TypeSegment::all()->keys()->implode(' ');
        }
        return TypeSegment::all()->where('product', $product)->keys()->implode(' ');
    }
}
