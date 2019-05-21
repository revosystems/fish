<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker {{ $errors->has('xef_pms_id') ? ' is-invalid' : '' }} @if (old('xef_general_typology_id') != 7) {{ 'disabled' }} @endif">
            <select class="selectpicker @if (old('xef_pms_id') !='') started @endif" name="xef_pms_id" id="xef_pms_id" title="{{ __('app.lead.xefPms') }}" data-size="5" @if (old('xef_general_typology_id') != 7) {{ 'disabled' }} @endif >
                @foreach(App\Models\LeadXefPms::all()->sortBy("name") as $xefPms)
                    <option value='{{$xefPms->id}}' @if (old('xef_pms_id') == $xefPms->id) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $xefPms->name }}</div>">
                        {{ $xefPms->name }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if (old('xef_pms_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
            </select>
            @include('components.lead.app-error-field', ['name' => 'xef_pms_id'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('xef_pms_id') != -1) {{ 'disabled' }} @endif ">
            <div class="input-group-text {{ $errors->has('xef_pms_other') ? ' is-invalid' : '' }} hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('xef_pms_id') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'xef_pms_other'])
        </div>
    </div>
</div>
