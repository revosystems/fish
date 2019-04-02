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
                                <select class="selectpicker @if (old('type') !='') {{ 'started' }} @endif" name="type" id="type" title="{{ __('app.lead.type') }}"  data-size="5">
                                    @foreach($lead_types as $type)
                                        <option class='{{ $type->class }}' value='{{$type->id}}'
                                                @if (old('type') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" name="type_segment_old" id="type_segment_old" value="{{old('type_segment')}}" />
                            <div class="form-group isPicker {{ $errors->has('type_segment') ? ' is-invalid' : '' }}">
                                <select class="selectpicker" name="type_segment" id="type_segment" title ="{{ __('app.lead.type_segment') }}"  data-size="5"></select>

                                @if ($errors->has('type_segment'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('type_segment') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('xef_typology_general') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_typology_general') !='') {{ 'started' }} @endif" name="xef_typology_general" id="xef_typology_general" title="{{ __('app.lead.xefTypologyGeneral') }}"  data-size="5">
                                    @foreach($lead_xef_typology_general as $typology)
                                        <option value='{{$typology->id}}'
                                                @if (old('xef_typology_general') == $typology->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefTypologyGeneral') }} </div><div class='colored'> {{ $typology->name }}</div>"
                                        >
                                            {{ $typology->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_typology_general'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_typology_general') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('xef_typology_specific') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_typology_specific') !='') {{ 'started' }} @endif" name="xef_typology_specific" id="type_specific" title="{{ __('app.lead.xefTypologySpecific') }}"  data-size="5">
                                    @foreach($lead_xef_typology_specific as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('xef_typology_specific') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefTypologySpecific') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_typology_specific'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_typology_specific') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-12">
                            <div class="form-group isPicker {{ $errors->has('retail_typology_general') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_typology_general') !='') {{ 'started' }} @endif" name="retail_typology_general" id="retail_typology_general" title="{{ __('app.lead.retailTypologyGeneral') }}"  data-size="5">
                                    @foreach($lead_retail_typology_general as $typology)
                                        <option value='{{$typology->id}}'
                                                @if (old('retail_typology_general') == $typology->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.retailTypologyGeneral') }} </div><div class='colored'> {{ $typology->name }}</div>"
                                        >
                                            {{ $typology->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_typology_general'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_typology_general') }}</span>
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
                                    <input type="text" name="xef_property_quantity" id="xef_property_quantity" value="{{ old('xef_property_quantity') }}" placeholder="{{ __('app.lead.xefPropertyQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('xef_property_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('xef_property_franchise') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_property_franchise') !='') {{ 'started' }} @endif" name="xef_property_franchise" id="xef_property_franchise" title="{{ __('app.lead.xefPropertyFranchise') }}"  data-size="5">
                                    @foreach($lead_xef_property_franchise as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('xef_property_franchise') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefPropertyFranchise') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_property_franchise'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_franchise') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large " style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <input type="hidden" name="xef_property_spaces[]" value="">
                            <div class="form-group isPicker {{ $errors->has('xef_property_spaces') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('xef_property_spaces') !='') {{ 'started' }} @endif" name="xef_property_spaces[]" id="xef_property_spaces" title="{{ __('app.lead.xefPropertySpaces') }}"  data-size="5" multiple>
                                    @foreach($lead_xef_property_spaces as $space)
                                        <option value='{{$space->id}}' @if (old('xef_property_spaces') !='' && in_array($space->id,old('xef_property_spaces'))) {{ 'selected' }} @endif
                                                @if (old('xef_property_spaces') == $space->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefPropertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"
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
                                    <input type="text" name="retail_property_quantity" id="retail_property_quantity" value="{{ old('retail_property_quantity') }}" placeholder="{{ __('app.lead.retailPropertyQuantity') }}" class="form-control" >
                                </div>
                                @if ($errors->has('retail_property_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_property_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <input type="hidden" name="retail_property_spaces[]" value="">
                            <div class="form-group isPicker {{ $errors->has('retail_property_spaces') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_property_spaces') !='') {{ 'started' }} @endif" name="retail_property_spaces[]" id="retail_property_spaces" title="{{ __('app.lead.retailPropertySpaces') }}"  data-size="5" multiple>
                                    @foreach($lead_retail_property_spaces as $space)
                                        <option value='{{$space->id}}' @if (old('retail_property_spaces') !='' && in_array($space->id,old('retail_property_spaces'))) {{ 'selected' }} @endif
                                                @if (old('retail_property_spaces') == $space->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.retailPropertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>"
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
                                <select class="selectpicker @if (old('devices') !='') {{ 'started' }} @endif" name="devices" id="devices" title="{{ __('app.lead.devices') }}"  data-size="5">
                                    @foreach($lead_devices as $response)
                                        <option value='{{$response->id}}'
                                                @if (old('devices') == $response->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'> {{ $response->name }}</div>"
                                        >
                                            {{ $response->name }}
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
                                <select class="selectpicker @if (old('xef_kds') !='') {{ 'started' }} @endif" name="xef_kds" id="xef_kds" title="{{ __('app.lead.xefKds') }}"  data-size="5">
                                    @foreach($lead_xef_kds as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('xef_kds') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('xef_kds'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group
                            @if (old('xef_kds') != 1)
                            {{ 'disabled' }}
                            @endif
                                    ">
                                <div class="input-group {{ $errors->has('xef_kds_quantity') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-addon"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control"
                                        @if (old('xef_kds') != 1)
                                            {{ 'disabled' }}
                                        @endif
                                    >
                                </div>
                                @if ($errors->has('xef_kds_quantity'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('retail_sale_mode') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_sale_mode') !='') {{ 'started' }} @endif" name="retail_sale_mode" id="retail_sale_mode" title="{{ __('app.lead.retailSaleMode') }}" data-size="5">
                                    @foreach($lead_retail_sale_mode as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('retail_sale_mode') == $type->id)
                                                {{ 'selected' }}
                                                @endif

                                                data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ $type->name }}</div>">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_sale_mode'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_mode') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('retail_sale_location') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('retail_sale_location') !='') {{ 'started' }} @endif" name="retail_sale_location" id="retail_sale_location" title="{{ __('app.lead.retailSaleLocation') }}" data-size="5">
                                    @foreach($lead_retail_sale_location as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('retail_sale_location') == $type->id)
                                                {{ 'selected' }}
                                                @endif

                                                data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'> {{ $type->name }}</div>">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('retail_sale_location'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_location') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row  dep_xef_small dep_xef_medium-large dep_retail_store dep_retail_franchise" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('pos') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('pos') !='') {{ 'started' }} @endif" name="pos" id="pos" title="{{ __('app.lead.pos') }}" data-size="5">
                                    @foreach($lead_pos as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('pos') == $type->id)
                                                {{ 'selected' }}
                                                @endif

                                                data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $type->name }}</div>">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('pos'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('pos') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('franchise_pos_external') ? ' is-invalid' : '' }}
                            @if (old('xef_property_franchise') != 1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <select class="selectpicker @if (old('franchise_pos_external') !='') {{ 'started' }} @endif" name="franchise_pos_external" id="franchise_pos_external" title="{{ __('app.lead.franchisePosExternal') }}"  data-size="5"
                                @if (old('xef_property_franchise') != 1)
                                    {{ 'disabled' }}
                                        @endif
                                >
                                    @foreach($lead_franchise_pos_external as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('franchise_pos_external') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('franchise_pos_external'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('franchise_pos_external') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row dep_xef_small dep_xef_medium-large" style="display: none;">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group isPicker {{ $errors->has('xef_pms') ? ' is-invalid' : '' }}
                            @if (old('xef_typology_general') != 7)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <select class="selectpicker @if (old('xef_pms') !='') {{ 'started' }} @endif" name="xef_pms" id="xef_pms" title="{{ __('app.lead.xefPms') }}"  data-size="5"
                                @if (old('xef_typology_general') != 7)
                                    {{ 'disabled' }}
                                        @endif
                                >
                                    @foreach($lead_xef_pms as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('xef_pms') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                        <option data-divider="true"></option>
                                        <option value='-1' @if (old('xef_pms') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                                </select>

                                @if ($errors->has('xef_pms'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pms') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group
                            @if (old('xef_pms') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group {{ $errors->has('xef_pms_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-addon"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('xef_pms') != -1)
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
                            <div class="form-group isPicker {{ $errors->has('erp') ? ' is-invalid' : '' }}">
                                <select class="selectpicker @if (old('erp') !='') {{ 'started' }} @endif" name="erp" id="erp" title="{{ __('app.lead.erp') }}"  data-size="5">
                                    @foreach($lead_erp as $type)
                                        <option value='{{$type->id}}'
                                                @if (old('erp') == $type->id)
                                                {{ 'selected' }}
                                                @endif
                                                data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $type->name }}</div>"
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                    <option data-divider="true"></option>
                                    <option value='-1' @if (old('erp') == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ __('app.lead.other') }}</div>"> {{ __('app.lead.other') }} </option>
                                </select>

                                @if ($errors->has('erp'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('erp') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group
                            @if (old('erp') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group {{ $errors->has('erp_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-addon"><i class="fa fa-angle-double-left"></i></span>
                                    <input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                                    @if (old('erp') != -1)
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
                                <select class="selectpicker @if (old('xef_soft') !='') {{ 'started' }} @endif" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" multiple>
                                    @foreach($lead_xef_soft as $types)
                                        <optgroup label="{{ $types->first()->typeCat->name}}">
                                            @foreach($types as $soft)
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
                            <div class="form-group
                            @if (old('xef_soft') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group {{ $errors->has('xef_soft_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-addon"><i class="fa fa-angle-double-left"></i></span>
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
                                <select class="selectpicker @if (old('retail_soft') !='') {{ 'started' }} @endif" name="retail_soft[]" id="retail_soft" title="{{ __('app.lead.retailSoft') }}"  data-size="5" multiple>
                                    @foreach($lead_retail_soft as $types)
                                        <optgroup label="{{ $types->first()->typeCat->name}}">
                                            @foreach($types as $soft)
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
                            <div class="form-group
                            @if (old('retail_soft') != -1)
                            {{ 'disabled' }}
                            @endif

                                    ">
                                <div class="input-group {{ $errors->has('retail_soft_other') ? ' is-invalid' : '' }} hasDependancy">
                                    <span class="input-group-addon"><i class="fa fa-angle-double-left"></i></span>
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

@endsection
