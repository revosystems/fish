<div class="row row_title  bold upper"><div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div></div>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.type') }}</label>
    <div class="col-sm-10">
        <select class="selectpicker form-control @if (old('type') !='') started @endif" name="type" id="type" title="{{ __('app.lead.type') }}"  data-size="5">
            <option class='dep.xef' value='{{App\Models\Lead::TYPE_XEF}}' @if (old('type') == App\Models\Lead::TYPE_XEF) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Xef</div>">
                Xef
            </option>
            <option class='dep.retail' value='{{App\Models\Lead::TYPE_RETAIL}}' @if (old('type') == App\Models\Lead::TYPE_RETAIL) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Retail</div>">
                Retail
            </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.type_segment') }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="##">
        <select class="selectpicker form-control" name="type_segment_id" id="type_segment_id" title ="{{ __('app.lead.type_segment') }}"  data-size="5"></select>

        @if ($errors->has('type_segment_id'))
            <span class="invalid-feedback" role="alert">{{ $errors->first('type_segment_id') }}</span>
        @endif
{{--        {{ Form::select('type_segment_id', createSelectArray( \App\Models\LeadTypesSegment::all()->sortBy("order"), true), $lead->type_segment_id)}}--}}
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.generalTypology') }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="##">
{{--        {{ Form::select('general_typology_id', createSelectArray( \App\Models\LeadGeneralTypology::all()->sortBy("order"), true), $lead->general_typology_id) }}--}}
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefSpecificTypology') }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="##">
{{--        {{ Form::select('xef_specific_typology_id', createSelectArray( \App\Models\LeadXefSpecificTypology::all()->sortBy("order"), true), $lead->xef_specific_typology_id) }}--}}
    </div>
</div>
<div class="row row_title bold upper"><div class="col-sm-12">{{ __('app.lead.informationTitle') }}</div></div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.name') }}</label>
    <div class="col-sm-10">
        <input type="text" name="name" id="name" value="{{ old('name') ? : $lead->name }}" placeholder="{{ __('app.lead.name') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.surname1') }}</label>
    <div class="col-sm-10">
        <input type="text" name="surname1" id="surname1" value="{{ old('surname1') ? : $lead->surname1 }}" placeholder="{{ __('app.lead.surname1') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.surname2') }}</label>
    <div class="col-sm-10">
        <input type="text" name="surname2" id="surname2" value="{{ old('surname2') ? : $lead->surname2 }}" placeholder="{{ __('app.lead.surname2') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.trade_name') }}</label>
    <div class="col-sm-10">
        <input type="text" name="trade_name" id="trade_name" value="{{ old('trade_name') ? : $lead->trade_name }}" placeholder="{{ __('app.lead.trade_name') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.email') }}</label>
    <div class="col-sm-10">
        <input type="email" name="email" id="email" value="{{ old('email') ? : $lead->email }}" placeholder="{{ __('app.lead.email') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.phone') }}</label>
    <div class="col-sm-10">
        <input type="text" name="phone" id="phone" value="{{ old('phone') ? : $lead->phone }}" placeholder="{{ __('app.lead.phone') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.city') }}</label>
    <div class="col-sm-10">
        <input type="text" name="city" id="city" value="{{ old('city') ? : $lead->city }}" placeholder="{{ __('app.lead.city') }}" class="form-control" >
    </div>
</div>

<div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise"><div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div></div>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.propertyQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="property_quantity" id="property_quantity" value="{{ old('property_quantity') ? : $lead->property_quantity }}" placeholder="{{ __('app.lead.propertyQuantity') }}" class="form-control" >
    </div>
</div>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.propertySpaces') }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="property_spaces" name="property_spaces">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefPropertyCapacity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_property_capacity" id="xef_property_capacity" value="{{ old('xef_property_capacity') ? : $lead->xef_property_capacity }}" placeholder="{{ __('app.lead.xefPropertyCapacity') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.retailPropertyStaffQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="retail_property_staff_quantity" id="retail_property_staff_quantity" value="{{ old('retail_property_staff_quantity') ? : $lead->retail_property_staff_quantity }}" placeholder="{{ __('app.lead.retailPropertyStaffQuantity') }}" class="form-control" >
    </div>
</div>

<div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise"><div class="col-sm-12">{{ __('app.lead.configurationTitle') }}</div></div>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefPosCriticalQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_pos_critical_quantity" id="xef_pos_critical_quantity" value="{{ old('xef_pos_critical_quantity') ? : $lead->xef_pos_critical_quantity }}" placeholder="{{ __('app.lead.xefPosCriticalQuantity') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefCashQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_cash_quantity" id="xef_cash_quantity" value="{{ old('xef_cash_quantity') ? : $lead->xef_cash_quantity }}" placeholder="{{ __('app.lead.xefCashQuantity') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefPrintersQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_printers_quantity" id="xef_printers_quantity" value="{{ old('xef_printers_quantity') ? : $lead->xef_printers_quantity }}" placeholder="{{ __('app.lead.xefPrintersQuantity') }}" class="form-control" >
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefKds') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="xef_kds_id" id="xef_kds_id" title="{{ __('app.lead.xefKds') }}"  data-size="5">
            @foreach(App\Models\LeadXefKds::all() as $xefKds)
                <option value='{{$xefKds->id}}' @if ($lead->xef_kds == $xefKds->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'> {{ $xefKds->name }}</div>">
                    {{ $xefKds->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefKdsQuantity') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') ? : $lead->xef_kds_quantity }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.devices') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="devices" id="devices" title="{{ __('app.lead.devices') }}"  data-size="5">
            @foreach(App\Models\LeadDevice::all() as $device)
                <option value='{{$device->id}}' @if ($lead->devices == $device->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'> {{ $device->name }}</div>">
                    {{ $device->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.retailSaleMode')}}</label>
    <div class="col-sm-10">
        <select class="form-control" name="retail_sale_mode_id" id="retail_sale_mode_id" title="{{ __('app.lead.retailSaleMode') }}" data-size="5">
        @foreach(App\Models\LeadRetailSaleMode::all() as $retailSaleMode)
            <option value='{{$retailSaleMode->id}}' @if ($lead->retail_sale_mode_id == $retailSaleMode->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ $retailSaleMode->name }}</div>">
                {{ $retailSaleMode->name }}
            </option>
            @endforeach
            </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.pos') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="pos_id" id="pos_id" title="{{ __('app.lead.pos') }}" data-size="5">
            @foreach(App\Models\LeadPos::all()->sortBy("name") as $pos)
                <option value='{{$pos->id}}' @if ($lead->pos_id == $pos->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $pos->name }}</div>">
                    {{ substr($pos->name, 0, 10) }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.xefPms') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="xef_pms_id" id="xef_pms_id" title="{{ __('app.lead.xefPms') }}"  data-size="5">
            @foreach(App\Models\LeadXefPms::all()->sortBy("name") as $xefPms)
                <option value='{{$xefPms->id}}' @if ($lead->xef_pms_id == $xefPms->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $xefPms->name }}</div>">
                    {{ $xefPms->name }}
                </option>
            @endforeach
            <option data-divider="true"></option>
            <option value='-1' @if ($lead->xef_pms_id == -1) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.erp') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="erp_id" id="erp_id" title="{{ __('app.lead.erp') }}"  data-size="5">
            @foreach(App\Models\LeadErp::all()->sortBy("name") as $erp)
                <option value='{{$erp->id}}' @if ($lead->erp_id == $erp->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $erp->name }}</div>">
                    {{ substr($erp->name, 0, 10) }}
                </option>
            @endforeach
            <option data-divider="true"></option>
            <option value='-1' @if (old('erp_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.retailSoft') }} (XEF)</label>
    <div class="col-sm-10">
        <input type="hidden" name="xef_soft[]" value="">
        <select class="form-control" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" multiple>
            @foreach($leadXefSofts as $xefSofts)
                <optgroup label="{{ $xefSofts->first()->softType->name}}">
                    @foreach($xefSofts as $soft)
                        <option value='{{$soft->id}}' @if ($lead->xef_soft != '' && in_array($soft->id, $lead->xef_soft)) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                            {{ $soft->name }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
            <option value='other' @if ($lead->xef_soft) {{ in_array(('other'), $lead->xef_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
            <option value='none' @if ($lead->xef_soft) {{ in_array(('none'), $lead->xef_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.retailSoft') }} (RETAIL)</label>
    <div class="col-sm-10">
        <input type="hidden" name="retail_soft[]" value="">
        <select class="form-control" name="retail_soft[]" id="retail_soft" title="{{ __('app.lead.retailSoft') }}"  data-size="5" multiple>
            @foreach($leadRetailSofts as $retailSofts)
                <optgroup label="{{ $retailSofts->first()->softType->name}}">
                    @foreach($retailSofts as $soft)
                        <option value='{{$soft->id}}' @if ($lead->retail_soft != '' && in_array($soft->id, $lead->retail_soft)) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                            {{ $soft->name }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
            <option value='other' @if ($lead->retail_soft) {{ in_array(('other'), $lead->retail_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
            <option value='none' @if ($lead->retail_soft) {{ in_array(('none'), $lead->retail_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.devicesHintPlaceholder') }}</label>
    <div class="col-sm-10">
        <textarea  class="form-control" rows="1" name="devices_current" id="devices_current">{{ $lead->devices_current }}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.retailSaleLocation') }}</label>
    <div class="col-sm-10">
        <select class="form-control" name="retail_sale_location_id" id="retail_sale_location_id" title="{{ __('app.lead.retailSaleLocation') }}" data-size="5">
            @foreach(App\Models\LeadRetailSaleLocation::all() as $saleLocation)
                <option value='{{$saleLocation->id}}' @if ($lead->retail_sale_location_id == $saleLocation->id){{ 'selected' }}@endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'> {{ $saleLocation->name }}</div>">
                    {{ $saleLocation->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">¿Autorización para usar otro?</label>
    <div class="col-sm-10">
        <select class="form-control" name="franchise_pos_external_id" id="franchise_pos_external_id" title="{{ __('app.lead.franchisePosExternal') }}"  data-size="5">
            @foreach(App\Models\LeadFranchisePosExternal::all() as $franchisePosExternal)
                <option value='{{$franchisePosExternal->id}}' @if ($lead->franchise_pos_external_id == $franchisePosExternal->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ $franchisePosExternal->name }}</div>">
                    {{ substr($franchisePosExternal->name, 0, 8) }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.specify') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') ? : $lead->xef_pms_other }}"  class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.specify') }}</label>
    <div class="col-sm-10">
        <input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') ? : $lead->erp_other }}"  class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.specify') }}</label>
    <div class="col-sm-10">
        <input type="text" name="xef_soft_other" id="xef_soft_other" value="{{ old('xef_soft_other') ? : $lead->xef_soft_other }}" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">{{ __('app.lead.specify') }}</label>
    <div class="col-sm-10">
        <input type="text" name="retail_soft_other" id="retail_soft_other" value="{{ old('retail_soft_other') ? : $lead->retail_soft_other }}" class="form-control">
    </div>
</div>