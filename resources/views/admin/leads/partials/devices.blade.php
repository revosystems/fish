<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker @if ($errors->has('devices'))is-invalid @endif">
            <select class="selectpicker form-control started" name="devices" id="devices"
                    title="{{ __('app.lead.devices') }}" data-style="btn-light" data-size="5">
                <option value='1' @if ($lead->devices)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'>{{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                <option value='0' @if (! $lead->devices)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'>{{ __('app.lead.no') }}</div>">{{ __('app.lead.yes') }}</option>
            </select>

            @if ($errors->has('devices'))
                <span class="invalid-feedback" role="alert">{{ $errors->first('devices') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5 devices_wrapper @if (old('devices') ==1) {{ 'shown' }} @endif">
            {{ __('app.lead.devicesHint') }}
            <div class="textarea-wrap">
                    <textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current"
                              id="devices_current"
                              class="form-control @if ($errors->has('devices_current'))is-invalid @endif">{{ old('devices_current') ? : $lead->devices_current }} </textarea>
                @if ($errors->has('devices_current'))
                    <span class="invalid-feedback" role="alert">{{ $errors->first('devices_current') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
