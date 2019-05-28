<input type="hidden" name="{{$name}}[]" value="">
<div class="form-group isPicker @if ($errors->has($name))is-invalid @endif">
    <select class="selectpicker @if (old($name) !='') started @endif" name="{{$name}}[]" id="{{$name}}" title="{{ __("app.lead." . ($title ?? $name)) }}" data-size="5" multiple>
        @foreach(App\Models\PropertySpace::all()->where('product', App\Models\Lead::PRODUCT_XEF) as $key => $value)
            <option value='{{$key}}'
                    @if (old($name) != '' && in_array($key, old($name)))selected
                    @endif @if (old($name) == $key)selected
                    @endif data-content="<div class='hideHint'>{{ __("app.lead." . ($title ?? $name)) }} </div><span class='colored'> {{ $value['name'] }}</span>">
                {{ $value['name'] }}
            </option>
        @endforeach
    </select>
    @include('components.lead.app-error-field', compact('name'))
</div>
