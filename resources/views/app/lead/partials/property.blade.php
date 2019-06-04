<div class="row show-on-product row_title bold upper" style="display: none;">
    <div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div>
</div>

<div class="row show-on-product" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.input', ['name' => 'property_quantity', 'title' => 'propertyQuantity'])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.noOwnLocal')], 'name' => 'property_franchise', 'title' => 'propertyFranchise'])
    </div>
</div>

<div class="row show-on-{{App\Models\Product::XEF}}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'xef_property_spaces', 'title' => 'propertySpace', 'options' => App\Models\PropertySpace::all()->where('product', App\Models\Product::XEF)])
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            @include('app.lead.components.input', ['name' => 'xef_property_capacity', 'title' => 'xefPropertyCapacity'])
        </div>
    </div>
</div>

<div class="row show-on-{{App\Models\Product::RETAIL}}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'retail_property_spaces', 'title' => 'propertySpace', 'options' => App\Models\PropertySpace::all()->where('product', App\Models\Product::RETAIL)])
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            @include('app.lead.components.input', ['name' => 'retail_property_capacity', 'title' => 'retailPropertyStaffQuantity'])
        </div>
    </div>
</div>
