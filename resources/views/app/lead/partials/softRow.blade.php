<input type="hidden" name="{{$name}}[]" value="">
<div class="form-group isPicker hasOverflow @if($errors->has($name))is-invalid @endif">
    <select class="selectpicker @if (old($name) !== null)started @endif" name="{{$name}}[]" id="{{$name}}" title="{{ __("app.lead." . ($title ?? $name)) }}" data-size="5" multiple>
        <option value='-1' @if (collect(old($name))->contains("-1"))selected @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
        <option value='-2' @if (collect(old($name))->contains("-2"))selected @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
        <option data-divider="true"></option>
        @foreach($options as $softTypeId => $softs)
            <optgroup label="{{ App\Models\SoftType::find($softTypeId)->name }}">
                @foreach($softs as $value)
                    <option value='{{$value->id}}' @if (collect(old($name))->contains($value->id))selected @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }} </div><span class='colored'> {{ $value->name }}</span>">
                        {{ $value->name }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @include('app.lead.components.error-field', compact('name'))
</div>
