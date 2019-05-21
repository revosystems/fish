<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-12 col-md-12">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'devices'])
        <div class="devices_wrapper @if (old('devices') == 1) {{ 'shown' }} @endif">
            {{ __('app.lead.devicesHint') }}
            <div class="textarea-wrap">
                <textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current" id="devices_current" class=" @if ($errors->has('devices_current'))is-invalid @endif">{{ old('devices_current') }}</textarea>
                @include('components.lead.app-error-field', ['name' => 'devices_current'])
            </div>
        </div>
    </div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-4 ">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'xef_pos_critical_quantity', 'title' => 'xefPosCriticalQuantity'])
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'xef_cash_quantity', 'title' => 'xefCashQuantity'])
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            @include('components.lead.app-input', ['name' => 'xef_printers_quantity', 'title' => 'xefPrintersQuantity'])
        </div>
    </div>
</div>