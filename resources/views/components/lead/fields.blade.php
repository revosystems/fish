<div class="row row_title  bold upper"><div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div></div>
<div class="grid">
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                {{--{{dd($lead->type)}}--}}
                <td>{{ __('app.lead.type') }}:</td>
                <td>{{ Form::select('type', createSelectArray( \App\Models\LeadType::all()->sortBy("order"), true), $lead->type) }}</td>
            </tr>

            <input type="hidden" name="type_segment_old" id="type_segment_old" value="{{old('type_segment')}}" />
            <tr>
                <td>{{ __('app.lead.type_segment') }}:</td>
                <td>{{ Form::select('type_segment', createSelectArray( \App\Models\LeadTypesSegment::all()->sortBy("order"), true), $lead->type_segment) }}</td>
            </tr>
            <tr>
                <td>{{ __('app.lead.retailTypologyGeneral') }}:</td>
                <td>{{ Form::select('retail_typology_general', createSelectArray( \App\Models\LeadRetailTypologyGeneral::all()->sortBy("order"), true), $lead->retail_typology_general) }}</td>
            </tr>
        </table>
    </div>
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.xefTypologyGeneral') }}:</td>
                <td>{{ Form::select('xef_typology_general', createSelectArray( \App\Models\LeadXefTypologyGeneral::all()->sortBy("order"), true), $lead->xef_typology_general) }}</td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefTypologySpecific') }}:</td>
                <td>{{ Form::select('xef_typology_specific', createSelectArray( \App\Models\LeadXefTypologySpecific::all()->sortBy("order"), true), $lead->xef_typology_specific) }}</td>
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
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.xefPropertyQuantity') }}</td>
                <td><input type="text" name="xef_property_quantity" id="xef_property_quantity" value="{{ old('xef_property_quantity') ? : $lead->xef_property_quantity }}" placeholder="{{ __('app.lead.xefPropertyQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>
                    {{--<input type="hidden" name="xef_property_spaces[]" value="">--}}
                    {{--<select class="selectpicker @if (old('xef_property_spaces') !='') {{ 'started' }} @endif" name="xef_property_spaces[]" id="xef_property_spaces" title="{{ __('app.lead.xefPropertySpaces') }}"  data-size="5" multiple>--}}
                        {{--@foreach($lead_xef_property_spaces as $space)--}}
                            {{--<option value='{{$space->id}}' @if (old('xef_property_spaces') !='' && in_array($space->id,old('xef_property_spaces'))) {{ 'selected' }} @endif--}}
                            {{--@if (old('xef_property_spaces') == $space->id)--}}
                            {{--{{ 'selected' }}--}}
                            {{--@endif--}}
                            {{--data-content="<div class='hideHint'>{{ __('app.lead.xefPropertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"--}}
                            {{-->--}}
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
                <td>{{ __('app.lead.retailPropertyQuantity') }}: </td>
                <td><input type="text" name="retail_property_quantity" id="retail_property_quantity" value="{{ old('retail_property_quantity') ? : $lead->retail_property_quantity }}" placeholder="{{ __('app.lead.retailPropertyQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>
                    {{--<input type="hidden" name="retail_property_spaces[]" value="">--}}
                    {{--<select class="selectpicker @if (old('retail_property_spaces') !='') {{ 'started' }} @endif" name="retail_property_spaces[]" id="retail_property_spaces" title="{{ __('app.lead.retailPropertySpaces') }}"  data-size="5" multiple>--}}
                    {{--@foreach($lead_retail_property_spaces as $space)--}}
                    {{--<option value='{{$space->id}}' @if (old('retail_property_spaces') !='' && in_array($space->id,old('retail_property_spaces'))) {{ 'selected' }} @endif--}}
                    {{--@if (old('retail_property_spaces') == $space->id)--}}
                    {{--{{ 'selected' }}--}}
                    {{--@endif--}}
                    {{--data-content="<div class='hideHint'>{{ __('app.lead.retailPropertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"--}}
                    {{-->--}}
                    {{--{{ $space->name }}--}}
                    {{--</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                </td>
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
                {{--<select class="selectpicker @if (old('devices') !='') {{ 'started' }} @endif" name="devices" id="devices" title="{{ __('app.lead.devices') }}"  data-size="5">--}}
                {{--@foreach($lead_devices as $response)--}}
                {{--<option value='{{$response->id}}'--}}
                {{--@if (old('devices') == $response->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}
                {{--data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'> {{ $response->name }}</div>"--}}
                {{-->--}}
                {{--{{ $response->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
            <tr>
                <td>{{ __('app.lead.devicesHintPlaceholder') }}:</td>
                <td><textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current" id="devices_current" class="{{ $errors->has('devices_current') ? ' is-invalid' : '' }}">{{ old('devices_current') }}</textarea></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefPosCriticalQuantity') }}:</td>
                <td><input type="text" name="xef_pos_critical_quantity" id="xef_pos_critical_quantity" value="{{ old('xef_pos_critical_quantity') ? : $lead->xef_pos_critical_quantity }}" placeholder="{{ __('app.lead.xefPosCriticalQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                <td>{{ __('app.lead.xefCashQuantity') }}:</td>
                <td><input type="text" name="xef_cash_quantity" id="xef_cash_quantity" value="{{ old('xef_cash_quantity') ? : $lead->xef_cash_quantity }}" placeholder="{{ __('app.lead.xefCashQuantity') }}" class="form-control" ></td>
            </tr>
        </table>
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.xefPrintersQuantity') }}:</td>
                <td><input type="text" name="xef_printers_quantity" id="xef_printers_quantity" value="{{ old('xef_printers_quantity') ? : $lead->xef_printers_quantity }}" placeholder="{{ __('app.lead.xefPrintersQuantity') }}" class="form-control" ></td>
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('xef_kds') !='') {{ 'started' }} @endif" name="xef_kds" id="xef_kds" title="{{ __('app.lead.xefKds') }}"  data-size="5">--}}
                {{--@foreach($lead_xef_kds as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('xef_kds') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}
                {{--data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'> {{ $type->name }}</div>"--}}
                {{-->--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
        </table>
    </div>
</div>
<div class="grid">
    <div class="col-min33">
        <table class="no-padding">
            <tr>
                <td>{{ __('app.lead.xefKdsQuantity') }}:</td>
                <td><input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') ? : $lead->xef_kds_quantity }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control"></td>
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('retail_sale_mode') !='') {{ 'started' }} @endif" name="retail_sale_mode" id="retail_sale_mode" title="{{ __('app.lead.retailSaleMode') }}" data-size="5">--}}
                {{--@foreach($lead_retail_sale_modes as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('retail_sale_mode') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}

                {{--data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ $type->name }}</div>">--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('retail_sale_location') !='') {{ 'started' }} @endif" name="retail_sale_location" id="retail_sale_location" title="{{ __('app.lead.retailSaleLocation') }}" data-size="5">--}}
                {{--@foreach($lead_retail_sale_locations as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('retail_sale_location') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}

                {{--data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'> {{ $type->name }}</div>">--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('pos') !='') {{ 'started' }} @endif" name="pos" id="pos" title="{{ __('app.lead.pos') }}" data-size="5">--}}
                {{--@foreach($lead_pos as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('pos') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}

                {{--data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $type->name }}</div>">--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('franchise_pos_external') !='') {{ 'started' }} @endif" name="franchise_pos_external" id="franchise_pos_external" title="{{ __('app.lead.franchisePosExternal') }}"  data-size="5"--}}
                {{--@if (old('xef_property_franchise') != 1)--}}
                {{--{{ 'disabled' }}--}}
                {{--@endif--}}
                {{-->--}}
                {{--@foreach($lead_franchise_pos_external as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('franchise_pos_external') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}
                {{--data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ $type->name }}</div>"--}}
                {{-->--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('xef_pms') !='') {{ 'started' }} @endif" name="xef_pms" id="xef_pms" title="{{ __('app.lead.xefPms') }}"  data-size="5"--}}
                {{--@if (old('xef_typology_general') != 7)--}}
                {{--{{ 'disabled' }}--}}
                {{--@endif--}}
                {{-->--}}
                {{--@foreach($lead_xef_pms as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('xef_pms') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}
                {{--data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $type->name }}</div>"--}}
                {{-->--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--<option data-divider="true"></option>--}}
                {{--<option value='-1' @if (old('xef_pms') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>--}}
                {{--</select>--}}
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') ? : $lead->xef_pms_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                {{--<select class="selectpicker @if (old('erp') !='') {{ 'started' }} @endif" name="erp" id="erp" title="{{ __('app.lead.erp') }}"  data-size="5">--}}
                {{--@foreach($lead_erp as $type)--}}
                {{--<option value='{{$type->id}}'--}}
                {{--@if (old('erp') == $type->id)--}}
                {{--{{ 'selected' }}--}}
                {{--@endif--}}
                {{--data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $type->name }}</div>"--}}
                {{-->--}}
                {{--{{ $type->name }}--}}
                {{--</option>--}}
                {{--@endforeach--}}
                {{--<option data-divider="true"></option>--}}
                {{--<option value='-1' @if (old('erp') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>--}}
                {{--</select>--}}
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') ? : $lead->erp_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="xef_soft[]" value="">
                    {{--<select class="selectpicker @if (old('xef_soft') !='') {{ 'started' }} @endif" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" multiple>--}}
                    {{--@foreach($lead_xef_soft as $types)--}}
                    {{--<optgroup label="{{ $types->first()->typeCat->name}}">--}}
                    {{--@foreach($types as $soft)--}}
                    {{--<option value='{{$soft->id}}' @if (old('xef_soft') !='' && in_array($soft->id,old('xef_soft'))) {{ 'selected' }} @endif--}}
                    {{--data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">--}}
                    {{--{{ $soft->name }}--}}
                    {{--</option>--}}
                    {{--@endforeach--}}
                    {{--</optgroup>--}}
                    {{--@endforeach--}}
                    {{--<option value='other' @if (old('xef_soft')) {{ in_array(('other'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>--}}
                    {{--<option value='none' @if (old('xef_soft')) {{ in_array(('none'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>--}}
                    {{--</select>--}}
                </td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="xef_soft_other" id="xef_soft_other" value="{{ old('xef_soft_other') ? : $lead->xef_soft_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="retail_soft[]" value="">
                    {{--<select class="selectpicker @if (old('retail_soft') !='') {{ 'started' }} @endif" name="retail_soft[]" id="retail_soft" title="{{ __('app.lead.retailSoft') }}"  data-size="5" multiple>--}}
                    {{--@foreach($lead_retail_soft as $types)--}}
                    {{--<optgroup label="{{ $types->first()->typeCat->name}}">--}}
                    {{--@foreach($types as $soft)--}}
                    {{--<option value='{{$soft->id}}' @if (old('retail_soft') !='' && in_array($soft->id,old('retail_soft'))) {{ 'selected' }} @endif--}}
                    {{--data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">--}}
                    {{--{{ $soft->name }}--}}
                    {{--</option>--}}
                    {{--@endforeach--}}
                    {{--</optgroup>--}}
                    {{--@endforeach--}}
                    {{--<option value='other' @if (old('retail_soft')) {{ in_array(('other'),old('retail_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>--}}
                    {{--<option value='none' @if (old('retail_soft')) {{ in_array(('none'),old('retail_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>--}}
                    {{--</select>--}}
                </td>
            </tr>
            <tr>
                <td>{{ __('app.lead.specify') }}:</td>
                <td><input type="text" name="retail_soft_other" id="retail_soft_other" value="{{ old('retail_soft_other') ? : $lead->retail_soft_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"></td>
            </tr>
        </table>
    </div>
</div>