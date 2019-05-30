<div class="form-group isPicker @if ($errors->has('retail_sale_mode'))is-invalid @endif">
    <select class="selectpicker form-control started" name="retail_sale_mode" id="retail_sale_mode"
            title="{{ __('app.lead.retailSaleMode') }}" data-style="btn-light" data-size="5">
        <option value='1' @if ($lead->retail_sale_mode === '1')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
        <option value='0' @if ($lead->retail_sale_mode === '0')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ __('app.lead.no') }}</div>">{{ __('app.lead.no')  }}</option>
    </select>

    @if ($errors->has('retail_sale_mode'))
        <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_mode') }}</span>
    @endif
</div>
