<div class="row {{App\Models\LeadTypesSegment::RETAIL_SEGMENT_FRANCHISE}} {{App\Models\LeadTypesSegment::XEF_SEGMENT_MEDIUM}} {{App\Models\LeadTypesSegment::XEF_SEGMENT_LARGE}}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker {{ $errors->has('erp') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('erp') !='') started @endif " name="erp" id="erp" title="{{ __('app.lead.erp') }}" data-size="5">
                @foreach(App\Models\LeadErp::all() as $key => $value)
                    <option value='{{$key}}' @if (old('erp') == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $value }}</div>">
                        {{ $value }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if (old('erp') == -1)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
            </select>
            @include('components.lead.app-error-field', ['name' => 'erp'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('erp') != -1) {{ 'disabled' }} @endif ">
            <div class="input-group-text @if ($errors->has('erp_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('erp') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'erp_other'])
        </div>
    </div>
</div>
