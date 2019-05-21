<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker {{ $errors->has('pos_id') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('pos_id') !='') started @endif " name="pos_id" id="pos_id" title="{{ __('app.lead.pos') }}" data-size="5">
                @foreach(App\Models\LeadPos::all()->sortBy("name") as $pos)
                    <option value='{{$pos->id}}' @if (old('pos_id') == $pos->id) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $pos->name }}</div>">
                        {{ $pos->name }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if (old('pos_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='-2' @if (old('pos_id') == -2) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>
            @include('components.lead.app-error-field', ['name' => 'pos_id'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('pos_id') != "-1"){{ 'disabled' }} @endif ">
            <div class="input-group-text {{ $errors->has('pos_other') ? ' is-invalid' : '' }} hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="pos_other" id="pos_other" value="{{ old('pos_other') }}"
                       placeholder="{{ __('app.lead.specify') }}" class="form-control"
                @if (old('pos_id') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'pos_other'])
        </div>
    </div>
</div>
<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-12 col-md-12">
        @include('components.lead.app-select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'franchise_pos_external_id', 'title' => 'retailSaleMode', 'disabledOn' => 'xef_property_franchise'])
    </div>
</div>
