<div class="form-group isPicker @if ($errors->has('can_use_another_pos'))is-invalid @endif">
    <select class="selectpicker form-control started" name="can_use_another_pos" id="can_use_another_pos" title="{{ __('app.lead.canUseAnotherPos') }}" data-style="btn-light" data-size="5">
        <option value='1' @if ($lead->can_use_another_pos === '1')selected @endif data-content="<div class='hideHint'>{{ __('app.lead.canUseAnotherPos') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
        <option value='0' @if (! $lead->can_use_another_pos === '0')selected @endif data-content="<div class='hideHint'>{{ __('app.lead.canUseAnotherPos') }} </div><div class='colored'> {{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
    </select>

    @if ($errors->has('can_use_another_pos'))
        <span class="invalid-feedback" role="alert">{{ $errors->first('can_use_another_pos') }}</span>
    @endif
</div>
