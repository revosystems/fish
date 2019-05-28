<div class="form-group isPicker @if ($errors->has($name))is-invalid @endif @if(isset($disabledOn) && old($disabledOn) != 1)disabled @endif">
    <select class="selectpicker @if (old($name) !== null)started @endif" name="{{$name}}" id="{{$id ?? $name}}" title="{{ __("app.lead." . ($title ?? $name)) }}" data-size="5" @if(isset($disabledOn) && old($disabledOn) != 1)disabled @endif>
        @foreach($options as $key => $value)
            <option value='{{ $key }}' @if (old($name) === (string)$key)selected @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }}</div><div class='colored'>{{ is_array($value) ? $value['name'] : $value }}</div>">
                {{ is_array($value) ? $value['name'] : $value }}
            </option>
        @endforeach
    </select>
    @include('components.lead.app-error-field', compact('name'))
</div>
