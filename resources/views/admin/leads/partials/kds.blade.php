<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker @if ($errors->has('xef_kds'))is-invalid @endif">
            <select class="selectpicker form-control started" name="xef_kds" id="xef_kds"
                    title="{{ __('app.lead.xefKds') }}" data-style="btn-light" data-size="5">
                <option value='1'
                        {{ old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                <option value='0'
                        {{ ! old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
            </select>

            @if ($errors->has('xef_kds'))
                <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5">
            <input type="text" name="xef_kds_quantity" id="xef_kds_quantity"
                   value="{{ old('xef_kds_quantity') ? : $lead->xef_kds_quantity }}"
                   placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control">
        </div>
    </div>
</div>
