<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker @if ($errors->has('xef_pms'))is-invalid @endif">
            <select class="selectpicker form-control started" name="xef_pms" id="xef_pms"
                    title="{{ __('app.lead.xefPms') }}" data-style="btn-light" data-size="5"
                    @if ($lead->general_typology != App\Models\GeneralTypology::HOTEL)disabled @endif>
                @foreach(App\Models\XefPms::all() as $key => $value)
                    <option value='{{$key}}' @if ($lead->xef_pms == $key)selected
                            @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $value['name'] }}</div>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if ($lead->xef_pms == -1)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
            </select>

            @if ($errors->has('xef_pms'))
                <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pms') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5 @if ($lead->xef_pms != -1)disabled @endif">
            <input type="text" name="xef_pms_other" id="xef_pms_other"
                   value="{{ old('xef_pms_other') ? : $lead->xef_pms_other }}"
                   placeholder="{{ __('app.lead.specify') }}" class="form-control"
                   @if ($lead->xef_pms != -1)disabled @endif>
        </div>
    </div>
</div>
