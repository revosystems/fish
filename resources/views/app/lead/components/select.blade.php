<div class="form-group isPicker @if ($errors->has($name))is-invalid @endif @if(isset($disabledOn) && old($disabledOn) != 1)disabled @endif @if(isset($disabled) && $disabled)disabled @endif">
    <select class="selectpicker @if (old($name) !== null)started @endif" name="{{$name}}" id="{{$id ?? $name}}" title="{{ __("app.lead." . ($title ?? $name)) }}" data-size="5" @if(isset($disabledOn) && old($disabledOn) != 1)disabled @endif @if(isset($disabled) && $disabled)disabled @endif>
        @if (isset($hasOther) && $hasOther)
            <option value='-1' @if (old($name) === "-1")selected @endif data-content="<div class='hideHint'>{{ __('app.lead.' . ($title ?? $name)) }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
        @endif
        @if (isset($hasNone) && $hasNone)
            <option value='-2' @if (old($name) === "-2")selected @endif data-content="<div class='hideHint'>{{ __('app.lead.' . ($title ?? $name)) }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
        @endif
        @if (isset($hasOther) || isset($hasNone))
            <option data-divider="true"></option>
        @endif
        @foreach($options as $key => $value)
            <option value='{{ $key }}' @if (old($name) === (string)$key)selected @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }}</div><div class='colored'>{{ is_array($value) ? $value['name'] : $value }}</div>">
                {{ is_array($value) ? $value['name'] : $value }}
            </option>
        @endforeach
    </select>
    @include('app.lead.components.error-field', compact('name'))
</div>
