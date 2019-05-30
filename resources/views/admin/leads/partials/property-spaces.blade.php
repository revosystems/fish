<input type="hidden" name="property_spaces[]" value="">
<div class="form-group isPicker @if ($errors->has("property_spaces"))is-invalid @endif">
    <select class="selectpicker form-control started" name="property_spaces[]" id="property_spaces"
            title="{{ __('app.lead.propertySpaces') }}" data-size="5" data-style="btn-light" multiple>
        @foreach(App\Models\PropertySpace::all()->where('product', $lead->product) as $key => $value)
            <option value='{{$key}}'
                    @if (in_array($key, explode(",", old("property_spaces"))) || in_array($key, explode(",", $lead->{"property_spaces"}))) selected
                    @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                {{ $value['name'] }}
            </option>
        @endforeach
    </select>
    @if ($errors->has("property_spaces"))
        <span class="invalid-feedback" role="alert">{{ $errors->first('property_spaces') }}</span>
    @endif
</div>
