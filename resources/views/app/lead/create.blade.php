@php
use App\Models\Lead;
@endphp
@extends('layouts.app')
@section('section', 'onLead')
@section('title', __('app.pageTitles.createLead').' - ')
@section('content')
    <form method="POST" action="{{ route('lead.store') }}">
        @csrf
        <div class="section">
                <div class="container">
                    @if (session('exception'))
                        <div class="alert a" role="alert">
                            {{session('exception')}}
                        </div>
                    @endif
                    <div class="row row_title no-mt">
                        <div class="col-sm-12">{{ __('app.lead.formHint') }}</div>
                    </div>
                    <div class="row row_title  bold upper"><div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('type') !='') started @endif" name="type" id="type" title="{{ __('app.lead.type') }}"  data-size="5">
                                    <option class='dep.xef' value='{{Lead::TYPE_XEF}}' @if (old('type') == Lead::TYPE_XEF) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Xef</div>">
                                        Xef
                                    </option>
                                    <option class='dep.retail' value='{{Lead::TYPE_RETAIL}}' @if (old('type') == Lead::TYPE_RETAIL) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Retail</div>">
                                        Retail
                                    </option>
                                </select>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" {{-- name="type_segment_id_old" --}} id="type_segment_id_old" value="{{old('type_segment_id')}}" />
                            <div class="form-group isPicker {{ $errors->has('type_segment_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker" name="type_segment_id" id="type_segment_id" title ="{{ __('app.lead.type_segment') }}"  data-size="5"></select>

                                @if ($errors->has('type_segment_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('type_segment_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('xef_general_typology_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_general_typology_id') !='') started @endif" name="xef_general_typology_id" id="xef_general_typology_id" title="{{ __('app.lead.generalTypology') }}"  data-size="5">
                                    @foreach($leadXefGeneralTypologies as $typology)
                                        <option value='{{$typology->id}}'
                                                @if (old('xef_general_typology_id') == $typology->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.generalTypology') }} </div><div class='colored'> {{ $typology->name }}</div>"
                                        >
                                            {{ $typology->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('xef_general_typology_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_general_typology_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('xef_specific_typology_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_specific_typology_id') !='') started @endif" name="xef_specific_typology_id" id="type_specific" title="{{ __('app.lead.xefSpecificTypology') }}"  data-size="5">
                                    @foreach(App\Models\LeadXefSpecificTypology::all() as $specificTypology)
                                        <option value='{{$specificTypology->id}}'
                                                @if (old('xef_specific_typology_id') == $specificTypology->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefSpecificTypology') }} </div><div class='colored'> {{ $specificTypology->name }}</div>"
                                        >
                                            {{ $specificTypology->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_specific_typology_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_specific_typology_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-12">
                            <div class="form-group isPicker {{ $errors->has('retail_general_typology_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_general_typology_id') !='') started @endif" name="retail_general_typology_id" id="retail_general_typology_id" title="{{ __('app.lead.generalTypology') }}"  data-size="5">
                                    @foreach($leadRetailGeneralTypologies as $generalTypology)
                                        <option value='{{$generalTypology->id}}'
                                                @if (old('retail_general_typology_id') == $generalTypology->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.generalTypology') }} </div><div class='colored'> {{ $generalTypology->name }}</div>"
                                        >
                                            {{ $generalTypology->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_general_typology_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_general_typology_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row row_title bold upper"><div class="col-sm-12">{{ __('app.lead.informationTitle') }}</div></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('app.lead.name') }}" class="form-control" >
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('surname1') ? ' is-invalid' : '' }}">
                                        <input type="text" name="surname1" id="surname1" value="{{ old('surname1') }}" placeholder="{{ __('app.lead.surname1') }}" class="form-control" >
                                    </div>
                                    @if ($errors->has('surname1'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('surname1') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('surname2') ? ' is-invalid' : '' }}">
                                        <input type="text" name="surname2" id="surname2" value="{{ old('surname2') }}" placeholder="{{ __('app.lead.surname2') }}" class="form-control" >
                                    </div>
                                    @if ($errors->has('surname2'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('surname2') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('trade_name') ? ' is-invalid' : '' }}">
                                    <input type="text" name="trade_name" id="trade_name" value="{{ old('trade_name') }}" placeholder="{{ __('app.lead.trade_name') }}" class="form-control" >
                                </div>
                                @if ($errors->has('trade_name'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('trade_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('app.lead.email') }}" class="form-control" >
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('app.lead.phone') }}" class="form-control" >
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('city') ? ' is-invalid' : '' }}">
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="{{ __('app.lead.city') }}" class="form-control" >
                                </div>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;"><div class="col-sm-12">{{ __('app.lead.propertyTitle') }}</div></div>
                    <div class="row dep_xef_small dep_xef_medium-large " style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('xef_property_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="xef_property_quantity" id="xef_property_quantity" value="{{ old('xef_property_quantity') }}" placeholder="{{ __('app.lead.propertyQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_property_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('xef_property_franchise_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_property_franchise_id') !='') started @endif" name="xef_property_franchise_id" id="xef_property_franchise_id" title="{{ __('app.lead.xefPropertyFranchise') }}"  data-size="5">
                                    @foreach(App\Models\LeadXefPropertyFranchise::all() as $propertyFranchise)
                                        <option value='{{$propertyFranchise->id}}'
                                                @if (old('xef_property_franchise_id') == $propertyFranchise->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefPropertyFranchise') }} </div><div class='colored'> {{ $propertyFranchise->name }}</div>"
                                        >
                                            {{ $propertyFranchise->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_property_franchise_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_franchise_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large " style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <input type="hidden" name="xef_property_spaces[]" value="">
                            <div class="form-group isPicker {{ $errors->has('xef_property_spaces') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_property_spaces') !='') started @endif" name="xef_property_spaces[]" id="xef_property_spaces" title="{{ __('app.lead.propertySpaces') }}"  data-size="5" multiple>
                                    @foreach($leadXefPropertySpaces as $space)
                                        <option value='{{$space->id}}' @if (old('xef_property_spaces') !='' && in_array($space->id,old('xef_property_spaces'))) {{ 'selected' }} @endif
                                                @if (old('xef_property_spaces') == $space->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"
                                        >
                                            {{ $space->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_property_spaces'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_spaces') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('xef_property_capacity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="xef_property_capacity" id="xef_property_capacity" value="{{ old('xef_property_capacity') }}" placeholder="{{ __('app.lead.xefPropertyCapacity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_property_capacity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_capacity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_store dep_retail_franchise " style="display: none;">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('retail_property_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="retail_property_quantity" id="retail_property_quantity" value="{{ old('retail_property_quantity') }}" placeholder="{{ __('app.lead.propertyQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('retail_property_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_property_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input type="hidden" name="retail_property_spaces[]" value="">
                            <div class="form-group isPicker {{ $errors->has('retail_property_spaces') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_property_spaces') !='') started @endif" name="retail_property_spaces[]" id="retail_property_spaces" title="{{ __('app.lead.propertySpaces') }}"  data-size="5" multiple>
                                    @foreach($leadRetailPropertySpaces as $space)
                                        <option value='{{$space->id}}' @if (old('retail_property_spaces') !='' && in_array($space->id,old('retail_property_spaces'))) {{ 'selected' }} @endif
                                                @if (old('retail_property_spaces') == $space->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"
                                        >
                                            {{ $space->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_property_spaces'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_property_spaces') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('retail_property_staff_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="retail_property_staff_quantity" id="retail_property_staff_quantity" value="{{ old('retail_property_staff_quantity') }}" placeholder="{{ __('app.lead.retailPropertyStaffQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('retail_property_staff_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_property_staff_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row row_title bold upper dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;"><div class="col-sm-12">{{ __('app.lead.configurationTitle') }}</div></div>
                    <div class="row  dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group isPicker {{ $errors->has('devices') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('devices') !='') started @endif" name="devices" id="devices" title="{{ __('app.lead.devices') }}"  data-size="5">
                                    @foreach(App\Models\LeadDevice::all() as $device)
                                        <option value='{{$device->id}}'
                                                @if (old('devices') == $device->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'> {{ $device->name }}</div>"
                                        >
                                            {{ $device->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('devices'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('devices') }}</span>
                                @endif
                            </div>
                            <div class="devices_wrapper @if (old('devices') ==1) {{ 'shown' }} @endif">
                                {{ __('app.lead.devicesHint') }}
                                <div class="textarea-wrap">
                                    <textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current" id="devices_current" class="{{ $errors->has('devices_current') ? ' is-invalid' : '' }}">{{ old('devices_current') }}</textarea>
                                    @if ($errors->has('devices_current'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('devices_current') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-4 ">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('xef_pos_critical_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="xef_pos_critical_quantity" id="xef_pos_critical_quantity" value="{{ old('xef_pos_critical_quantity') }}" placeholder="{{ __('app.lead.xefPosCriticalQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_pos_critical_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pos_critical_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('xef_cash_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="xef_cash_quantity" id="xef_cash_quantity" value="{{ old('xef_cash_quantity') }}" placeholder="{{ __('app.lead.xefCashQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_cash_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_cash_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('xef_printers_quantity') ? ' is-invalid' : '' }}">
                                    <input type="text" name="xef_printers_quantity" id="xef_printers_quantity" value="{{ old('xef_printers_quantity') }}" placeholder="{{ __('app.lead.xefPrintersQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_printers_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_printers_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row  dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('xef_kds') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_kds') != '') started @endif" name="xef_kds" id="xef_kds" title="{{ __('app.lead.xefKds') }}"  data-size="5">
                                    <option value='1' {{ old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                                    <option value='0' {{ ! old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
                                </select>

                                @if ($errors->has('xef_kds'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW {{ old('xef_kds') != 1 ? 'disabled' : '' }}">
                                <div class="input-group-text {{ $errors->has('xef_kds_quantity') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control" {{ old('xef_kds') != 1 ? 'disabled' : '' }}>
                                </div>
                                @if ($errors->has('xef_kds_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('retail_sale_mode_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_sale_mode_id') !='') started @endif" name="retail_sale_mode_id" id="retail_sale_mode_id" title="{{ __('app.lead.retailSaleMode') }}" data-size="5">
                                    @foreach(App\Models\LeadRetailSaleMode::all() as $saleMode)
                                        <option value='{{$saleMode->id}}' {{ old('retail_sale_mode_id') == $saleMode->id ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ $saleMode->name }}</div>">
                                            {{ $saleMode->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_sale_mode_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_mode_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('retail_sale_location_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_sale_location_id') !='') started @endif" name="retail_sale_location_id" id="retail_sale_location_id" title="{{ __('app.lead.retailSaleLocation') }}" data-size="5">
                                    @foreach(App\Models\LeadRetailSaleLocation::all() as $saleLocation)
                                        <option value='{{$saleLocation->id}}'
                                                @if (old('retail_sale_location_id') == $saleLocation->id)
                                                {{ 'selected' }}
                                                @endif

                                                data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'> {{ $saleLocation->name }}</div>">
                                            {{ $saleLocation->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_sale_location_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_location_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row  dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('pos_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('pos_id') !='') started @endif" name="pos_id" id="pos_id" title="{{ __('app.lead.pos') }}" data-size="5">
                                    @foreach(App\Models\LeadPos::all()->sortBy("name") as $pos)
                                        <option value='{{$pos->id}}'
                                                @if (old('pos_id') == $pos->id)
                                                {{ 'selected' }}
                                                @endif

                                                data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $pos->name }}</div>">
                                            {{ $pos->name }}
                                        </option>
                                    @endforeach
                                    <option data-divider="true"></option>
                                    <option value='-1' @if (old('pos_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                                    <option value='-2' @if (old('pos_id') == -2) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                                </select>

                                @if ($errors->has('pos_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('pos_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW
                            @if (old('pos_id') != "-1")
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group-text {{ $errors->has('pos_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="pos_other" id="pos_other" value="{{ old('pos_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('pos_id') != -1)
                                        {{ 'disabled' }}
                                            @endif
                                    >
                                </div>
                                @if ($errors->has('pos_other'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('pos_other') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row  dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group isPicker {{ $errors->has('franchise_pos_external_id') ? ' is-invalid' : '' }}
                            @if (old('xef_property_franchise_id') != 1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <select class="selectpicker @if (old('franchise_pos_external_id') !='') started @endif" name="franchise_pos_external_id" id="franchise_pos_external_id" title="{{ __('app.lead.franchisePosExternal') }}"  data-size="5"
                                @if (old('xef_property_franchise_id') != 1)
                                    {{ 'disabled' }}
                                        @endif
                                >
                                    @foreach(App\Models\LeadFranchisePosExternal::all() as $franchisePosExternal)
                                        <option value='{{$franchisePosExternal->id}}'
                                                @if (old('franchise_pos_external_id') == $franchisePosExternal->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ $franchisePosExternal->name }}</div>"
                                        >
                                            {{ $franchisePosExternal->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('franchise_pos_external_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('franchise_pos_external_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('xef_pms_id') ? ' is-invalid' : '' }}
                            @if (old('xef_general_typology_id') != 7)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <select class="selectpicker @if (old('xef_pms_id') !='') started @endif" name="xef_pms_id" id="xef_pms_id" title="{{ __('app.lead.xefPms') }}"  data-size="5"
                                @if (old('xef_general_typology_id') != 7)
                                    {{ 'disabled' }}
                                        @endif
                                >
                                    @foreach(App\Models\LeadXefPms::all()->sortBy("name") as $xefPms)
                                        <option value='{{$xefPms->id}}'
                                                @if (old('xef_pms_id') == $xefPms->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $xefPms->name }}</div>"
                                        >
                                            {{ $xefPms->name }}
                                        </option>
                                    @endforeach
                                        <option data-divider="true"></option>
                                        <option value='-1' @if (old('xef_pms_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                                </select>

                                @if ($errors->has('xef_pms_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pms_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW
                            @if (old('xef_pms_id') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group-text {{ $errors->has('xef_pms_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('xef_pms_id') != -1)
                                        {{ 'disabled' }}
                                            @endif
                                    >
                                </div>
                                @if ($errors->has('xef_pms_other'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pms_other') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_medium-large dep_retail_franchise" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('erp_id') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('erp_id') !='') started @endif" name="erp_id" id="erp_id" title="{{ __('app.lead.erp') }}"  data-size="5">
                                    @foreach(App\Models\LeadErp::all()->sortBy("name") as $erp)
                                        <option value='{{$erp->id}}'
                                                @if (old('erp_id') == $erp->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $erp->name }}</div>"
                                        >
                                            {{ $erp->name }}
                                        </option>
                                    @endforeach
                                    <option data-divider="true"></option>
                                    <option value='-1' @if (old('erp_id') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                                </select>

                                @if ($errors->has('erp_id'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('erp_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW
                            @if (old('erp_id') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group-text {{ $errors->has('erp_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('erp_id') != -1)
                                        {{ 'disabled' }}
                                            @endif
                                    >
                                </div>
                                @if ($errors->has('erp_other'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('erp_other') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_medium-large" style="display: none;">
                        <input type="hidden" name="xef_soft[]" value="">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker hasOverflow {{ $errors->has('xef_soft') ? ' is-invalid' : '' }}">

                                <select class="selectpicker @if (old('xef_soft') !='') started @endif" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" multiple>
                                    @foreach($leadXefSofts as $xefSofts)
                                        <optgroup label="{{ $xefSofts->first()->softType->name}}">
                                            @foreach($xefSofts as $soft)
                                                <option value='{{$soft->id}}' @if (old('xef_soft') !='' && in_array($soft->id,old('xef_soft'))) {{ 'selected' }} @endif
                                                        data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                                                    {{ $soft->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                    <option value='other' @if (old('xef_soft')) {{ in_array(('other'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                                    <option value='none' @if (old('xef_soft')) {{ in_array(('none'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                                </select>

                                @if ($errors->has('xef_soft'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW
                            @if (old('xef_soft') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group-text {{ $errors->has('xef_soft_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="xef_soft_other" id="xef_soft_other" value="{{ old('xef_soft_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('xef_soft') != -1)
                                        {{ 'disabled' }}
                                            @endif
                                    >
                                </div>
                                @if ($errors->has('xef_soft_other'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_soft_other') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_franchise" style="display: none;">
                        <input type="hidden" name="retail_soft[]" value="">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker hasOverflow {{ $errors->has('retail_soft') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_soft') !='') started @endif" name="retail_soft[]" id="retail_soft" title="{{ __('app.lead.retailSoft') }}"  data-size="5" multiple>
                                    @foreach($leadRetailSofts as $retailSofts)
                                        <optgroup label="{{ $retailSofts->first()->softType->name}}">
                                            @foreach($retailSofts as $soft)
                                                <option value='{{$soft->id}}' @if (old('retail_soft') !='' && in_array($soft->id,old('retail_soft'))) {{ 'selected' }} @endif
                                                        data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                                                  {{ $soft->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                    <option value='other' @if (old('retail_soft')) {{ in_array(('other'),old('retail_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                                    <option value='none' @if (old('retail_soft')) {{ in_array(('none'),old('retail_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                                </select>

                                @if ($errors->has('retail_soft'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_soft') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group hasDW
                            @if (old('retail_soft') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group-text {{ $errors->has('retail_soft_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="retail_soft_other" id="retail_soft_other" value="{{ old('retail_soft_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('retail_soft') != -1)
                                        {{ 'disabled' }}
                                            @endif
                                    >
                                </div>
                                @if ($errors->has('retail_soft_other'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_soft_other') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn">{{ __('app.lead.saveLead') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{--@if ($errors->count()) {{dd($errors)}}@endif--}}

@endsection
