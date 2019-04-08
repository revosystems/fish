<div class="row row_title  bold upper"><div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div></div>
<div class="grid">
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.type') }}:</td>
                <td>{{ Form::select('type', createSelectArray( \App\Models\LeadType::all()->sortBy("order"), true), $lead->type) }}</td>
            </tr>

            {{--<input type="hidden" name="type_segment_id_old" id="type_segment_id_old" value="{{old('type_segment_id')}}" />--}}
            <tr>
                <td>{{ __('app.lead.type_segment') }}:</td>
                <td>{{ Form::select('type_segment_id', createSelectArray( \App\Models\LeadTypesSegment::all()->sortBy("order"), true), $lead->type_segment_id) }}</td>
            </tr>
        </table>
    </div>
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.generalTypology') }}:</td>
                <td>{{ Form::select('general_typology_id', createSelectArray( \App\Models\LeadGeneralTypology::all()->sortBy("order"), true), $lead->general_typology_id) }}</td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefSpecificTypology') }}:</td>
                <td>{{ Form::select('xef_specific_typology_id', createSelectArray( \App\Models\LeadXefSpecificTypology::all()->sortBy("order"), true), $lead->xef_specific_typology_id) }}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row row_title bold upper"><div class="col-sm-12">{{ __('app.lead.informationTitle') }}</div></div>
<div class="grid">
    <div class="col-min66">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.name') }}:</td>
                <td><input type="text" name="name" id="name" value="{{ old('name') ? : $lead->name }}" placeholder="{{ __('app.lead.name') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.surname1') }}:</td>
                <td><input type="text" name="surname1" id="surname1" value="{{ old('surname1') ? : $lead->surname1 }}" placeholder="{{ __('app.lead.surname1') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.surname2') }}:</td>
                <td><input type="text" name="surname2" id="surname2" value="{{ old('surname2') ? : $lead->surname2 }}" placeholder="{{ __('app.lead.surname2') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.trade_name') }}:</td>
                <td><input type="text" name="trade_name" id="trade_name" value="{{ old('trade_name') ? : $lead->trade_name }}" placeholder="{{ __('app.lead.trade_name') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.email') }}:</td>
                <td><input type="email" name="email" id="email" value="{{ old('email') ? : $lead->email }}" placeholder="{{ __('app.lead.email') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.phone') }}</td>
                <td><input type="text" name="phone" id="phone" value="{{ old('phone') ? : $lead->phone }}" placeholder="{{ __('app.lead.phone') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.city') }}</td>
                <td><input type="text" name="city" id="city" value="{{ old('city') ? : $lead->city }}" placeholder="{{ __('app.lead.city') }}" class="form-control" ></td>
            </tr>
        </table>
    </div>
</div>

<div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise"><div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div></div>
<div class="grid">
    <div class="col-min66">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.propertyQuantity') }}</td>
                <td><input type="text" name="property_quantity" id="property_quantity" value="{{ old('property_quantity') ? : $lead->property_quantity }}" placeholder="{{ __('app.lead.propertyQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.propertySpaces') }}</td>
                <td>
                    {{--<input type="hidden" name="property_spaces[]" value="">--}}
                    {{--<select class="selectpicker" name="property_spaces[]" id="property_spaces" title="{{ __('app.lead.propertySpaces') }}"  data-size="5" multiple>--}}
{{--                        @foreach(App\Models\LeadPropertySpaces::all() as $space)--}}
                            {{--<option value='{{$space->id}}' @if ($lead->property_spaces != '' && in_array($space->id, $lead->property_spaces) || $lead->property_spaces == $space->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>">--}}
                                {{--{{ $space->name }}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                </td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefPropertyCapacity') }}: </td>
                <td><input type="text" name="xef_property_capacity" id="xef_property_capacity" value="{{ old('xef_property_capacity') ? : $lead->xef_property_capacity }}" placeholder="{{ __('app.lead.xefPropertyCapacity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailPropertyStaffQuantity') }}</td>
                <td><input type="text" name="retail_property_staff_quantity" id="retail_property_staff_quantity" value="{{ old('retail_property_staff_quantity') ? : $lead->retail_property_staff_quantity }}" placeholder="{{ __('app.lead.retailPropertyStaffQuantity') }}" class="form-control" ></td>
            </tr>
        </table>
    </div>
</div>
<div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise"><div class="col-sm-12">{{ __('app.lead.configurationTitle') }}</div></div>
<div class="grid">
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.xefPosCriticalQuantity') }}:</td>
                <td><input type="text" name="xef_pos_critical_quantity" id="xef_pos_critical_quantity" value="{{ old('xef_pos_critical_quantity') ? : $lead->xef_pos_critical_quantity }}" placeholder="{{ __('app.lead.xefPosCriticalQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefCashQuantity') }}:</td>
                <td><input type="text" name="xef_cash_quantity" id="xef_cash_quantity" value="{{ old('xef_cash_quantity') ? : $lead->xef_cash_quantity }}" placeholder="{{ __('app.lead.xefCashQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefPrintersQuantity') }}:</td>
                <td><input type="text" name="xef_printers_quantity" id="xef_printers_quantity" value="{{ old('xef_printers_quantity') ? : $lead->xef_printers_quantity }}" placeholder="{{ __('app.lead.xefPrintersQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefKds') }}</td>
                <td><select class="selectpicker" name="xef_kds_id" id="xef_kds_id" title="{{ __('app.lead.xefKds') }}"  data-size="5">
                    @foreach(App\Models\LeadXefKds::all() as $xefKds)
                        <option value='{{$xefKds->id}}' @if ($lead->xef_kds == $xefKds->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'> {{ $xefKds->name }}</div>">
                            {{ $xefKds->name }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefKdsQuantity') }}:</td>
                <td><input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') ? : $lead->xef_kds_quantity }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>
<div class="grid">
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.devices') }}:</td>
                <td><select class="selectpicker" name="devices" id="devices" title="{{ __('app.lead.devices') }}"  data-size="5">
                    @foreach(App\Models\LeadDevice::all() as $device)
                        <option value='{{$device->id}}' @if ($lead->devices == $device->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'> {{ $device->name }}</div>">
                            {{ $device->name }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailSaleMode')}}</td>
                <td><select class="selectpicker" name="retail_sale_mode_id" id="retail_sale_mode_id" title="{{ __('app.lead.retailSaleMode') }}" data-size="5">
                    @foreach(App\Models\LeadRetailSaleMode::all() as $retailSaleMode)
                        <option value='{{$retailSaleMode->id}}' @if ($lead->retail_sale_mode_id == $retailSaleMode->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ $retailSaleMode->name }}</div>">
                            {{ $retailSaleMode->name }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.pos') }}</td>
                <td><select class="selectpicker" name="pos_id" id="pos_id" title="{{ __('app.lead.pos') }}" data-size="5">
                    @foreach(App\Models\LeadPos::all()->sortBy("name") as $pos)
                        <option value='{{$pos->id}}' @if ($lead->pos_id == $pos->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $pos->name }}</div>">
                            {{ substr($pos->name, 0, 10) }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefPms') }}</td>
                <td><select class="selectpicker" name="xef_pms_id" id="xef_pms_id" title="{{ __('app.lead.xefPms') }}"  data-size="5">
                    @foreach(App\Models\LeadXefPms::all()->sortBy("name") as $xefPms)
                        <option value='{{$xefPms->id}}' @if ($lead->xef_pms_id == $xefPms->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $xefPms->name }}</div>">
                            {{ $xefPms->name }}
                        </option>
                    @endforeach
                    <option data-divider="true"></option>
                    <option value='-1' @if ($lead->xef_pms_id == -1) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.erp') }}</td>
                <td><select class="selectpicker" name="erp_id" id="erp_id" title="{{ __('app.lead.erp') }}"  data-size="5">
                    @foreach(App\Models\LeadErp::all()->sortBy("name") as $erp)
                        <option value='{{$erp->id}}' @if ($lead->erp_id == $erp->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $erp->name }}</div>">
                            {{ substr($erp->name, 0, 10) }}
                        </option>
                    @endforeach
                    <option data-divider="true"></option>
                    <option value='-1' @if (old('erp_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailSoft') }} (XEF)</td>
                <td>
                    {{--<input type="hidden" name="xef_soft[]" value="">--}}
                    <select class="selectpicker" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" multiple>
                        @foreach(App\Models\LeadSoft::whereType(App\Models\LeadType::XEF)->orderBy("name")->groupBy("soft_type_id")->get() as $xefSofts)
                            <optgroup label="{{ $xefSofts->first()->softType->name}}">
                                {{--@foreach($xefSofts as $soft)--}}
                                    {{--<option value='{{$soft->id}}' @if ($lead->xef_soft != '' && in_array($soft->id, $lead->xef_soft)) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">--}}
                                        {{--{{ $soft->name }}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            </optgroup>
                        @endforeach
{{--                        <option value='other' @if ($lead->xef_soft) {{ in_array(('other'), $lead->xef_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>--}}
{{--                        <option value='none' @if ($lead->xef_soft) {{ in_array(('none'), $lead->xef_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>--}}
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailSoft') }} (RETAIL)</td>
                <td>
                    {{--<input type="hidden" name="retail_soft[]" value="">--}}
                    <select class="selectpicker" name="retail_soft[]" id="retail_soft" title="{{ __('app.lead.retailSoft') }}"  data-size="5" multiple>
                        @foreach(App\Models\LeadSoft::whereType(App\Models\LeadType::RETAIL)->orderBy("name")->groupBy("soft_type_id")->get() as $retailSofts)
                            <optgroup label="{{ $retailSofts->first()->softType->name}}">
                                {{--@foreach($retailSofts as $soft)--}}
                                    {{--<option value='{{$soft->id}}' @if ($lead->retail_soft != '' && in_array($soft->id, $lead->retail_soft)) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">--}}
                                        {{--{{ $soft->name }}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            </optgroup>
                        @endforeach
{{--                        <option value='other' @if ($lead->retail_soft) {{ in_array(('other'), $lead->retail_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>--}}
{{--                        <option value='none' @if ($lead->retail_soft) {{ in_array(('none'), $lead->retail_soft) ? ' selected' : '' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>--}}
                </select></td>
            </tr>
        </table>
    </div>
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.devicesHintPlaceholder') }}:</td>
                <td><textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current" id="devices_current">{{ $lead->devices_current }}</textarea></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailSaleLocation') }}</td>
                <td><select class="selectpicker" name="retail_sale_location_id" id="retail_sale_location_id" title="{{ __('app.lead.retailSaleLocation') }}" data-size="5">
                    @foreach(App\Models\LeadRetailSaleLocation::all() as $saleLocation)
                        <option value='{{$saleLocation->id}}' @if ($lead->retail_sale_location_id == $saleLocation->id){{ 'selected' }}@endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'> {{ $saleLocation->name }}</div>">
                            {{ $saleLocation->name }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>¿Autorización para usar otro?</td>
                <td><select class="selectpicker" name="franchise_pos_external_id" id="franchise_pos_external_id" title="{{ __('app.lead.franchisePosExternal') }}"  data-size="5">
                    @foreach(App\Models\LeadFranchisePosExternal::all() as $franchisePosExternal)
                        <option value='{{$franchisePosExternal->id}}' @if ($lead->franchise_pos_external_id == $franchisePosExternal->id) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ $franchisePosExternal->name }}</div>">
                            {{ substr($franchisePosExternal->name, 0, 8) }}
                        </option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') ? : $lead->xef_pms_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') ? : $lead->erp_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="xef_soft_other" id="xef_soft_other" value="{{ old('xef_soft_other') ? : $lead->xef_soft_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="retail_soft_other" id="retail_soft_other" value="{{ old('retail_soft_other') ? : $lead->retail_soft_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>
