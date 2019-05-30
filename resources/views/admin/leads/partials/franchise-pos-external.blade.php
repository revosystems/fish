<div class="form-group isPicker @if ($errors->has('franchise_pos_external'))is-invalid @endif">
    <select class="selectpicker form-control started" name="franchise_pos_external"
            id="franchise_pos_external" title="{{ __('app.lead.franchisePosExternal') }}"
            data-style="btn-light" data-size="5">
        <option value='1' @if ($lead->franchise_pos_external === '1')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
        <option value='0' @if (! $lead->franchise_pos_external === '0')selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
    </select>

    @if ($errors->has('franchise_pos_external'))
        <span class="invalid-feedback" role="alert">{{ $errors->first('franchise_pos_external') }}</span>
    @endif
</div>
