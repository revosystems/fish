<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker @if($errors->has('pos'))is-invalid @endif">
            <select class="selectpicker @if (old('pos') !='') started @endif" name="pos" id="pos" title="{{ __('app.lead.pos') }}" data-size="5">
                @foreach(App\Models\Pos::all() as $key => $value)
                    <option value='{{$key}}' @if (old('pos') == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $value['name'] }}</div>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if (old('pos') == -1)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='-2' @if (old('pos') == -2)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>
            @include('app.lead.components.error-field', ['name' => 'pos'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('pos') != "-1")disabled @endif ">
            <div class="input-group-text @if($errors->has('pos_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="pos_other" id="pos_other" value="{{ old('pos_other') }}"
                       placeholder="{{ __('app.lead.specify') }}" class="form-control"
                @if (old('pos') != -1)disabled @endif >
            </div>
            @include('app.lead.components.error-field', ['name' => 'pos_other'])
        </div>
    </div>
</div>
<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-12 col-md-12">
        @include('app.lead.components.select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'franchise_pos_external', 'title' => 'retailSaleMode', 'disabledOn' => 'xef_property_franchise'])
    </div>
</div>
