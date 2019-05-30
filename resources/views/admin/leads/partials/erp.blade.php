<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker @if ($errors->has('erp'))is-invalid @endif">
            <select class="selectpicker form-control started" name="erp" id="erp" title="{{ __('app.lead.erp') }}"
                    data-style="btn-light" data-size="5">
                @foreach(App\Models\Erp::all() as $key => $value)
                    <option value='{{$key}}' @if ($lead->erp == $key)selected
                            @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $value['name'] }}</div>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if ($lead->erp == -1)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
            </select>

            @if ($errors->has('erp'))
                <span class="invalid-feedback" role="alert">{{ $errors->first('erp') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5 @if ($lead->xef_pms != -1)disabled @endif">
            <input type="text" name="erp_other" id="erp_other"
                   value="{{ old('erp_other') ? : $lead->xef_pms_other }}"
                   placeholder="{{ __('app.lead.specify') }}" class="form-control"
                   @if ($lead->erp != -1)disabled @endif>
        </div>
    </div>
</div>
