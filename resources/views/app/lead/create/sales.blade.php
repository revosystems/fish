<div class="row @segmentClasses(App\Models\Lead::PRODUCT_RETAIL)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'retail_sale_mode', 'title' => 'retailSaleMode'])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.onLocal'), '0' => __('app.lead.onMobility')], 'name' => 'retail_sale_location', 'title' => 'retailSaleLocation'])
    </div>
</div>