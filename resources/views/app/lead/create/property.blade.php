<div class="row @segmentClasses() row_title bold upper" style="display: none;">
    <div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-input', ['name' => 'xef_property_quantity', 'title' => 'propertyQuantity'])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.noOwnLocal')], 'name' => 'xef_property_franchise', 'title' => 'xefPropertyFranchise'])
    </div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-multiple-select', ['name' => 'xef_property_spaces', 'title' => 'propertySpaces', 'options' => App\Models\PropertySpace::all()->where('product', App\Models\Lead::PRODUCT_XEF)])
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'xef_property_capacity', 'title' => 'xefPropertyCapacity'])
        </div>
    </div>
</div>
<div class="row @segmentClasses(App\Models\Lead::PRODUCT_RETAIL)" style="display: none;">
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'retail_property_quantity', 'title' => 'propertyQuantity'])
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        @include('components.lead.app-multiple-select', ['name' => 'retail_property_spaces', 'title' => 'propertySpaces', 'options' => App\Models\PropertySpace::all()->where('product', App\Models\Lead::PRODUCT_RETAIL)])
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'retail_property_capacity', 'title' => 'retailPropertyStaffQuantity'])
        </div>
    </div>
</div>
