<div class="row @segmentClasses(App\Models\Product::XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'xef_kds', 'title' => 'xefKds'])
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('xef_kds') != 1)disabled @endif">
            <div class="input-group-text @if ($errors->has('xef_kds_quantity'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control" {{ old('xef_kds') != 1 ? 'disabled' : '' }}>
            </div>
            @include('app.lead.components.error-field', ['name' => 'xef_kds_quantity'])
        </div>
    </div>
</div>
