<div class="form-group isPicker @if ($errors->has('property_franchise'))is-invalid @endif">
    <select class="selectpicker form-control started" name="property_franchise" id="property_franchise" title="{{ __('app.lead.propertyFranchise') }}" data-style="btn-light" data-size="5">
        <option value='1' @if ($lead->property_franchise == 1) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertyFranchise') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
        <option value='0' @if ($lead->property_franchise == 0) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertyFranchise') }} </div><div class='colored'> {{ __('app.lead.noOwnLocal') }}</div>">{{ __('app.lead.noOwnLocal') }}</option>
    </select>

    @if ($errors->has('property_franchise'))
        <span class="invalid-feedback"
              role="alert">{{ $errors->first('property_franchise') }}</span>
    @endif
</div>
