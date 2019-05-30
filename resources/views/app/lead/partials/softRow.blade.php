<div class="row {{$segments}}" style="display: none;">
    <input type="hidden" name="{{$name}}[]" value="">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker hasOverflow @if($errors->has($name))is-invalid @endif">
            <select class="selectpicker @if (old($name) != '')started @endif" name="{{$name}}[]" id="soft" title="{{ $title }}" data-size="5" multiple>
                @foreach($options as $softType)
                    <optgroup label="{{ App\Models\SoftType::find($softType)->reference['name'] }}">
                        @foreach(App\Models\Soft::all()->where('product', $product)->where('softType', $softType) as $key => $value)
                            <option value='{{$key}}' @if (old($name) !='' && in_array($key, old($name)))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                                {{ $value['name'] }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
                <optgroup label="">
                    <option value='other' @if (old($name) && in_array(('other'), old($name)))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                    <option value='none' @if (old($name) && in_array(('none'), old($name)))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                </optgroup>
            </select>

            @include('app.lead.components.error-field', compact('name'))
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old($name) != -1)disabled @endif">
            <div class="input-group-text @if ($errors->has("{$name}_other"))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="{{$name}}_other" id="soft_other" value="{{ old("{$name}_other") }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old($name) != -1)disabled @endif >
            </div>
            @include('app.lead.components.error-field', ['name' => "{$name}_other"])
        </div>
    </div>
</div>
