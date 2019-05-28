<div class="row @segmentClasses() row_title bold upper" style="display: none;">
    <div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-input', ['name' => 'property_quantity', 'title' => 'propertyQuantity'])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.noOwnLocal')], 'name' => 'xef_property_franchise', 'title' => 'xefPropertyFranchise'])
    </div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <input type="hidden" name="property_spaces[]" value="">
        <div class="form-group isPicker @if ($errors->has('property_spaces'))is-invalid @endif">
            <select class="selectpicker @if (old('property_spaces') !='') started @endif" name="property_spaces[]" id="property_spaces" title="{{ __('app.lead.propertySpaces') }}" data-size="5" multiple>
                @foreach(App\Models\PropertySpace::all()->where('product', App\Models\Lead::PRODUCT_XEF) as $key => $value)
                    <option value='{{$key}}' @if (old('property_spaces') != '' && in_array($key, old('property_spaces')))selected @endif @if (old('property_spaces') == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
            </select>
            @include('components.lead.app-error-field', ['name' => 'property_spaces'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'property_capacity', 'title' => 'xefPropertyCapacity'])
        </div>
    </div>
</div>
<div class="row @segmentClasses(App\Models\Lead::PRODUCT_RETAIL)" style="display: none;">
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'property_quantity', 'title' => 'propertyQuantity'])
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <input type="hidden" name="property_spaces[]" value="">
        <div class="form-group isPicker @if ($errors->has('property_spaces'))is-invalid @endif">
            <select class="selectpicker @if (old('property_spaces') !='') started @endif" name="property_spaces[]" id="property_spaces" title="{{ __('app.lead.propertySpaces') }}" data-size="5" multiple>
                @foreach(App\Models\PropertySpace::all()->where('product', App\Models\Lead::PRODUCT_RETAIL) as $key => $value)
                    <option value='{{$key}}' @if (old('property_spaces') !='' && in_array($key, old('property_spaces')))selected @endif @if (old('property_spaces') == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
            </select>
            @include('components.lead.app-error-field', ['name' => 'property_spaces'])
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'property_capacity', 'title' => 'retailPropertyStaffQuantity'])
        </div>
    </div>
</div>
