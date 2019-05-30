<div class="form-group isPicker @if ($errors->has('retail_sale_location'))is-invalid @endif">
    <select class="selectpicker form-control started" name="retail_sale_location"
            id="retail_sale_location" title="{{ __('app.lead.retailSaleLocation') }}"
            data-style="btn-light" data-size="5">
        <option value='1' @if ($lead->retail_sale_location === '1')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'>{{ __('app.lead.onLocal') }}</div>">{{ __('app.lead.onLocal') }}</option>
        <option value='0' @if ($lead->retail_sale_location === '0')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'>{{ __('app.lead.onMobility') }}</div>">{{ __('app.lead.onMobility') }}</option>
    </select>

    @if ($errors->has('retail_sale_location'))
        <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_location') }}</span>
    @endif
</div>
