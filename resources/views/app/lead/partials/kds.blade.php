<div class="row @segmentClasses(App\Models\Product::XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'xef_kds', 'title' => 'xefKds'])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'xef_kds', 'otherField' => 'quantity'])
    </div>
</div>
