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
        <input type="hidden" name="xef_property_spaces[]" value="">
        <div class="form-group isPicker {{ $errors->has('xef_property_spaces') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('xef_property_spaces') !='') started @endif" name="xef_property_spaces[]" id="xef_property_spaces" title="{{ __('app.lead.propertySpaces') }}" data-size="5" multiple>
                @foreach(App\Models\LeadPropertySpaces::whereProduct(App\Models\Lead::PRODUCT_XEF)->get() as $space)
                    <option value='{{$space->id}}' @if (old('xef_property_spaces') != '' && in_array($space->id,old('xef_property_spaces'))) {{ 'selected' }} @endif @if (old('xef_property_spaces') == $space->id) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>">
                        {{ $space->name }}
                    </option>
                @endforeach
            </select>
            @include('components.lead.app-error-field', ['name' => 'xef_property_spaces'])
        </div>
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
        <input type="hidden" name="retail_property_spaces[]" value="">
        <div class="form-group isPicker {{ $errors->has('retail_property_spaces') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('retail_property_spaces') !='') started @endif" name="retail_property_spaces[]" id="retail_property_spaces" title="{{ __('app.lead.propertySpaces') }}" data-size="5" multiple>
                @foreach(App\Models\LeadPropertySpaces::whereProduct(App\Models\Lead::PRODUCT_RETAIL)->get() as $space)
                    <option value='{{$space->id}}' @if (old('retail_property_spaces') !='' && in_array($space->id, old('retail_property_spaces'))) {{ 'selected' }} @endif @if (old('retail_property_spaces') == $space->id) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>">
                        {{ $space->name }}
                    </option>
                @endforeach
            </select>
            @include('components.lead.app-error-field', ['name' => 'retail_property_spaces'])
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'retail_property_staff_quantity', 'title' => 'retailPropertyStaffQuantity'])
        </div>
    </div>
</div>
