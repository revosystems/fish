<?php
function getSoftTypes($product)
{
    $softTypeIds = App\Models\Soft::all()->where('product', $product)->pluck("softType")->unique();
    $softTypes = App\Models\SoftType::all()->filter(function ($value, $key) use ($softTypeIds) {
        return $softTypeIds->contains($key);
    });
    return $softTypes->keys();
}
?>
@include('app.lead.partials.softRow', ['product' => App\Models\Product::XEF, 'options' => getSoftTypes(App\Models\Product::XEF), 'name' => 'xef_soft', 'title' => __('app.lead.xefSoft')])
@include('app.lead.partials.softRow', ['product' => App\Models\Product::RETAIL, 'options' => getSoftTypes(App\Models\Product::RETAIL), 'name' => 'retail_soft', 'title' => __('app.lead.retailSoft')])
