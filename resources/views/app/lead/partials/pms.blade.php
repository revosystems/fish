<div class="row @segmentClasses(App\Models\Product::XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker @if($errors->has('xef_pms'))is-invalid @endif @if (old('general_typology') != 7)disabled @endif">
            <select class="selectpicker @if (old('xef_pms') !='') started @endif" name="xef_pms" id="xef_pms" title="{{ __('app.lead.xefPms') }}" data-size="5" @if (old('general_typology') != 7)disabled @endif >
                @foreach(App\Models\XefPms::all() as $key => $value)
                    <option value='{{$key}}' @if (old('xef_pms') == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $value['name'] }}</div>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if (old('xef_pms') == -1)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
            </select>
            @include('app.lead.components.error-field', ['name' => 'xef_pms'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('xef_pms') != -1) {{ 'disabled' }} @endif ">
            <div class="input-group-text @if($errors->has('xef_pms_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('xef_pms') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('app.lead.components.error-field', ['name' => 'xef_pms_other'])
        </div>
    </div>
</div>
