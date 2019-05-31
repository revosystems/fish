<div class="row @segmentClasses($product)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <input type="hidden" name="{{$name}}[]" value="">
        <div class="form-group isPicker hasOverflow @if($errors->has($name))is-invalid @endif">
            <select class="selectpicker @if (old($name) !== null)started @endif" name="{{$name}}" id="soft" title="{{ $title }}" data-size="5" multiple>
                <option value='-1' @if (old($name) === "-1")selected @endif data-content="<div class='hideHint'>{{ $title }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='-2' @if (old($name) === "-2")selected @endif data-content="<div class='hideHint'>{{ $title }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                <option data-divider="true"></option>
                @foreach($options as $softType)
                    <optgroup label="{{ App\Models\SoftType::find($softType)->reference['name'] }}">
                        @foreach(App\Models\Soft::all()->where('product', $product)->where('softType', $softType) as $key => $value)
                            <option value='{{$key}}' @if (old($name) !='' && in_array($key, old($name)))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                                {{ $value['name'] }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            @include('app.lead.components.error-field', compact('name'))
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', compact('name'))
    </div>
</div>
