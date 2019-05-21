@php
    $productName = $lead->product == App\Models\Lead::PRODUCT_XEF ? "xef" : "retail";
@endphp

<div class="card card-small mb-4">
    <div class="card-header border-bottom">
        <h6 class="m-0"> {{ __('app.lead.clientTitle') }} </h6>
    </div>
    <div class="card-body p-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group isPicker @if ($errors->has('type'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="type" id="type" title="{{ __('app.lead.type') }}"  data-style="btn-light">
                        <option class='dep.xef' value='{{App\Models\Lead::PRODUCT_XEF}}' @if ($lead->product == App\Models\Lead::PRODUCT_XEF) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Xef</div>">
                            Xef
                        </option>
                        <option class='dep.retail' value='{{App\Models\Lead::PRODUCT_RETAIL}}' @if ($lead->product == App\Models\Lead::PRODUCT_RETAIL) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type') }}</div><div class='colored'>Retail</div>">
                            Retail
                        </option>
                    </select>

                    @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('type') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" id="type_segment_old" value="{{old('type_segment')}}" />
                <div class="form-group isPicker @if ($errors->has('type_segment'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="type_segment" id="type_segment" title="{{ __('app.lead.type_segment') }}"  data-style="btn-light" data-size="5">
                        @foreach(\App\Models\LeadTypesSegment::byProduct($lead->product) as $key => $value)
                            <option value='{{$key}}' @if ($lead->product_segment_id == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.type_segment') }} </div><div class='colored'> {{ $value }}</div>">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if ($errors->has('type_segment'))
                    <span class="invalid-feedback" role="alert">{{ $errors->first('type_segment') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group @if ($lead->product == 2) ? mb-0 @endif isPicker @if ($errors->has('general_typology_id'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="general_typology_id" id="general_typology_id" title="{{ __('app.lead.generalTypology') }}"  data-style="btn-light" data-size="5">
                        @foreach(\App\Models\LeadGeneralTypology::all()->whereIn("product", $lead->product)->sortBy("order") as $typology)
                            <option value='{{$typology->id}}'
                                    @if ($lead->general_typology_id == $typology->id)
                                    {{ 'selected' }}
                                    @endif
                                    data-content="<div class='hideHint'>{{ __('app.lead.generalTypology') }} </div><div class='colored'> {{ $typology->name }}</div>"
                            >
                                {{ $typology->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('general_typology_id'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('general_typology_id') }}</span>
                    @endif
                </div>
            </div>
        </div>

        @if($lead->product == App\Models\Lead::PRODUCT_XEF)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-0 isPicker @if ($errors->has('xef_specific_typology_id'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="xef_specific_typology_id" id="type_specific" title="{{ __('app.lead.xefSpecificTypology') }}"  data-style="btn-light" data-size="5">
                            @foreach(App\Models\LeadXefSpecificTypology::all() as $key => $value)
                                <option value='{{$key}}' @if ($lead->xef_specific_typology_id == $key)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSpecificTypology') }} </div><div class='colored'> {{ $value }}</div>">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('xef_specific_typology_id'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('xef_specific_typology_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="card card-small mb-4">
    <div class="card-header border-bottom">
        <h6 class="m-0"> {{ __('app.lead.informationTitle') }} </h6>
    </div>
    <div class="card-body p-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="name" id="name" value="{{ old('name') ? : $lead->name }}" placeholder="{{ __('app.lead.name') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="surname1" id="surname1" value="{{ old('surname1') ? : $lead->surname1 }}" placeholder="{{ __('app.lead.surname1') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="surname2" id="surname2" value="{{ old('surname2') ? : $lead->surname2 }}" placeholder="{{ __('app.lead.surname2') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="trade_name" id="trade_name" value="{{ old('trade_name') ? : $lead->trade_name }}" placeholder="{{ __('app.lead.trade_name') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="email" name="email" id="email" value="{{ old('email') ? : $lead->email }}" placeholder="{{ __('app.lead.email') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" id="phone" value="{{ old('phone') ? : $lead->phone }}" placeholder="{{ __('app.lead.phone') }}" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mb-0">
                    <input type="text" name="city" id="city" value="{{ old('city') ? : $lead->city }}" placeholder="{{ __('app.lead.city') }}" class="form-control" >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-small mb-4">
    <div class="card-header border-bottom">
        <h6 class="m-0"> {{ __('app.lead.propertyTitle') }} </h6>
    </div>
    <div class="card-body p-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <input type="text" name="property_quantity" id="property_quantity" value="{{ old('property_quantity') ? : $lead->property_quantity }}" placeholder="{{ __('app.lead.propertyQuantity') }}" class="form-control" >
                </div>
            </div>
        </div>
        @if($lead->product == App\Models\Lead::PRODUCT_XEF)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group isPicker @if ($errors->has('xef_property_franchise'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="xef_property_franchise" id="xef_property_franchise" title="{{ __('app.lead.xefPropertyFranchise') }}"  data-style="btn-light" data-size="5">
                            <option value='1' @if ($lead->xef_property_franchise == 1) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPropertyFranchise') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                            <option value='0' @if ($lead->xef_property_franchise == 0) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPropertyFranchise') }} </div><div class='colored'> {{ __('app.lead.noOwnLocal') }}</div>">{{ __('app.lead.noOwnLocal') }}</option>
                        </select>

                        @if ($errors->has('xef_property_franchise'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('xef_property_franchise') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="{{$productName}}_property_spaces[]" value="">
                <div class="form-group isPicker @if ($errors->has("{$productName}_property_spaces"))is-invalid @endif">
                    <select class="selectpicker form-control started" name="{{$productName}}_property_spaces[]" id="{{$productName}}_property_spaces" title="{{ __('app.lead.propertySpaces') }}"  data-size="5" data-style="btn-light" multiple>
                        @foreach(App\Models\LeadPropertySpaces::whereProduct($lead->product)->orderBy("order")->get() as $space)

                            <option value='{{$space->id}}' @if (in_array($space->id, explode(",",old($productName."_property_spaces"))) || in_array($space->id,explode(",",$lead->{$productName."_property_spaces"}))) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.propertySpaces') }} </div><span class='colored'> {{ $space->name }}</span>">
                                {{ $space->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has("{$productName}_property_spaces"))
                        <span class="invalid-feedback" role="alert">{{ $errors->first($productName.'_property_spaces') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @if($lead->product == App\Models\Lead::PRODUCT_XEF)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-0">
                        <input type="text" name="xef_property_capacity" id="xef_property_capacity" value="{{ old('xef_property_capacity') ? : $lead->xef_property_capacity }}" placeholder="{{ __('app.lead.xefPropertyCapacity') }}" class="form-control" >
                    </div>
                </div>
            </div>
        @endif
        @if($lead->product == App\Models\Lead::PRODUCT_RETAIL)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-0">
                        <input type="text" name="retail_property_staff_quantity" id="retail_property_staff_quantity" value="{{ old('retail_property_staff_quantity') ? : $lead->retail_property_staff_quantity }}" placeholder="{{ __('app.lead.retailPropertyStaffQuantity') }}" class="form-control" >
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="card card-small mb-4">
    <div class="card-header border-bottom">
        <h6 class="m-0"> {{ __('app.lead.configurationTitle') }} </h6>
    </div>
    <div class="card-body p-3">
        @if($lead->product == App\Models\Lead::PRODUCT_XEF)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="xef_pos_critical_quantity" id="xef_pos_critical_quantity" value="{{ old('xef_pos_critical_quantity') ? : $lead->xef_pos_critical_quantity }}" placeholder="{{ __('app.lead.xefPosCriticalQuantity') }}" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="xef_cash_quantity" id="xef_cash_quantity" value="{{ old('xef_cash_quantity') ? : $lead->xef_cash_quantity }}" placeholder="{{ __('app.lead.xefCashQuantity') }}" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="xef_printers_quantity" id="xef_printers_quantity" value="{{ old('xef_printers_quantity') ? : $lead->xef_printers_quantity }}" placeholder="{{ __('app.lead.xefPrintersQuantity') }}" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group isPicker @if ($errors->has('xef_kds'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="xef_kds" id="xef_kds" title="{{ __('app.lead.xefKds') }}"  data-style="btn-light" data-size="5">
                            <option value='1' {{ old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                            <option value='0' {{ ! old('xef_kds') ? 'selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefKds') }} </div><div class='colored'>{{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
                        </select>

                        @if ($errors->has('xef_kds'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('xef_kds') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group ml-5">
                        <input type="text" name="xef_kds_quantity" id="xef_kds_quantity" value="{{ old('xef_kds_quantity') ? : $lead->xef_kds_quantity }}" placeholder="{{ __('app.lead.xefKdsQuantity') }}" class="form-control">
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group isPicker @if ($errors->has('devices'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="devices" id="devices" title="{{ __('app.lead.devices') }}" data-style="btn-light" data-size="5">
                        <option value='1' @if ($lead->devices == 1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'>{{ __('app.lead.yes') }}</div>">{{ $value }}</option>
                        <option value='2' @if ($lead->devices == 2) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.devices') }} </div><div class='colored'>{{ __('app.lead.no') }}</div>">{{ $value }}</option>
                    </select>

                    @if ($errors->has('devices'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('devices') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group ml-5 devices_wrapper @if (old('devices') ==1) {{ 'shown' }} @endif">
                    {{ __('app.lead.devicesHint') }}
                    <div class="textarea-wrap">
                        <textarea rows="1" placeholder="{{ __('app.lead.devicesHintPlaceholder') }}" name="devices_current" id="devices_current" class="form-control @if ($errors->has('devices_current'))is-invalid @endif">{{ old('devices_current') ? : $lead->devices_current }} </textarea>
                        @if ($errors->has('devices_current'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('devices_current') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($lead->product == App\Models\Lead::PRODUCT_RETAIL)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group isPicker @if ($errors->has('retail_sale_mode'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="retail_sale_mode" id="retail_sale_mode" title="{{ __('app.lead.retailSaleMode') }}"  data-style="btn-light" data-size="5">
                                <option value='1' @if ($lead->retail_sale_mode === '1')selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                                <option value='2' @if ($lead->retail_sale_mode === '0')selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleMode') }} </div><div class='colored'> {{ __('app.lead.no') }}</div>">{{ __('app.lead.no')  }}</option>
                        </select>

                        @if ($errors->has('retail_sale_mode'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_mode') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group isPicker @if ($errors->has('pos_id'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="pos_id" id="pos_id" title="{{ __('app.lead.pos') }}"  data-style="btn-light" data-size="5">
                        @foreach(App\Models\LeadPos::all()->sortBy("order") as $pos)
                            <option value='{{$pos->id}}'
                                    @if ($lead->pos_id == $pos->id)
                                    {{ 'selected' }}
                                    @endif
                                    data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $pos->name }}</div>"
                            >
                                {{ $pos->name }}
                            </option>
                        @endforeach
                        <option data-divider="true"></option>
                        <option value='-1' @if ($lead->pos_id == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                        <option value='-2' @if ($lead->pos_id == -2) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                    </select>

                    @if ($errors->has('pos_id'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('pos_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group ml-5
                    @if ($lead->pos_id != -1)
                        {{ ' disabled ' }}
                    @endif
                ">
                    <input type="text" name="pos_other" id="pos_other" value="{{ old('pos_other') ? : $lead->pos_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                    @if ($lead->pos_id != -1)
                        {{ ' disabled ' }}
                    @endif
                    >
                </div>
            </div>
        </div>
        @if($lead->product == App\Models\Lead::PRODUCT_XEF)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group isPicker @if ($errors->has('xef_pms_id'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="xef_pms_id" id="xef_pms_id" title="{{ __('app.lead.xefPms') }}"  data-style="btn-light" data-size="5"
                            @if ($lead->general_typology_id != 7)
                                {{ ' disabled ' }}
                            @endif
                        >
                            @foreach(App\Models\LeadXefPms::all()->sortBy("order") as $xefPms)
                                <option value='{{$xefPms->id}}'
                                    @if ($lead->xef_pms_id == $xefPms->id)
                                        {{ 'selected' }}
                                    @endif
                                    data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><div class='colored'> {{ $xefPms->name }}</div>"
                                >
                                    {{ $xefPms->name }}
                                </option>
                            @endforeach
                            <option data-divider="true"></option>
                            <option value='-1' @if ($lead->xef_pms_id == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefPms') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                        </select>

                        @if ($errors->has('xef_pms_id'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('xef_pms_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group ml-5
                        @if ($lead->xef_pms_id != -1)
                            {{ ' disabled ' }}
                        @endif
                    ">
                        <input type="text" name="xef_pms_other" id="xef_pms_other" value="{{ old('xef_pms_other') ? : $lead->xef_pms_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control"
                            @if ($lead->xef_pms_id != -1)
                                {{ ' disabled ' }}
                            @endif
                        >
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" name="{{$productName}}_soft[]" value="">
                <div class="form-group isPicker @if ($errors->has("{$productName}_soft"))is-invalid @endif">
                    <select class="selectpicker form-control started" name="{{$productName}}_soft[]" id="{{$productName}}_soft" title="{{ __('app.lead.xefSoft') }}"  data-size="5" data-style="btn-light" multiple>
                        @foreach(App\Models\LeadSoft::whereProduct($lead->product)->orderBy("name")->get()->groupBy("soft_type_id") as $softs)
                            <optgroup label="{{ $softs->first()->softType->name}}">
                                @foreach($softs as $softItem)
                                    <option value='{{$softItem->id}}' @if (in_array($softItem->id, explode(",",old($productName."_soft"))) || in_array($softItem->id,explode(",",$lead->{$productName."_soft"}))) selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $softItem->name }}</span>">
                                        {{ $softItem->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                        <option value='other' {{ in_array("other", explode(",",$lead->{$productName."_soft"})) ? ' selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                        <option value='none' {{ in_array("none", explode(",",$lead->{$productName."_soft"})) ? ' selected' : '' }} data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
                    </select>

                    @if ($errors->has("{$productName}_soft"))
                        <span class="invalid-feedback" role="alert">{{ $errors->first($productName.'_soft') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @if($lead->product == App\Models\Lead::PRODUCT_RETAIL)
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group isPicker @if ($errors->has('retail_sale_location'))is-invalid @endif">
                        <select class="selectpicker form-control started" name="retail_sale_location" id="retail_sale_location" title="{{ __('app.lead.retailSaleLocation') }}"  data-style="btn-light" data-size="5">
                            <option value='1' @if ($lead->retail_sale_location == 1)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'>{{ __('app.lead.onLocal') }}</div>">{{ __('app.lead.onLocal') }}</option>
                            <option value='2' @if ($lead->retail_sale_location == 2)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSaleLocation') }} </div><div class='colored'>{{ __('app.lead.onMobility') }}</div>">{{ __('app.lead.onMobility') }}</option>
                        </select>

                        @if ($errors->has('retail_sale_location'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('retail_sale_location') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group isPicker @if ($errors->has('franchise_pos_external_id'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="franchise_pos_external_id" id="franchise_pos_external_id" title="{{ __('app.lead.franchisePosExternal') }}"  data-style="btn-light" data-size="5">
                        <option value='2' @if ($lead->franchise_pos_external_id == 2)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ __('app.lead.yes') }}</div>">{{ __('app.lead.yes') }}</option>
                        <option value='2' @if ($lead->franchise_pos_external_id == 2)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.franchisePosExternal') }} </div><div class='colored'> {{ __('app.lead.no') }}</div>">{{ __('app.lead.no') }}</option>
                    </select>

                    @if ($errors->has('franchise_pos_external_id'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('franchise_pos_external_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group isPicker @if ($errors->has('erp_id'))is-invalid @endif">
                    <select class="selectpicker form-control started" name="erp_id" id="erp_id" title="{{ __('app.lead.erp') }}"  data-style="btn-light" data-size="5">
                        @foreach(App\Models\LeadErp::all()->sortBy("order") as $erp)
                            <option value='{{$erp->id}}' @if ($lead->erp_id == $erp->id)selected @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><div class='colored'> {{ $erp->name }}</div>">
                                {{ $erp->name }}
                            </option>
                        @endforeach
                        <option data-divider="true"></option>
                        <option value='-1' @if ($lead->erp_id == -1) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.erp') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                    </select>

                    @if ($errors->has('erp_id'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('erp_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group ml-5 @if ($lead->xef_pms_id != -1)disabled @endif">
                    <input type="text" name="erp_other" id="erp_other" value="{{ old('erp_other') ? : $lead->xef_pms_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if ($lead->erp_id != -1)disabled @endif>
                </div>
            </div>
        </div>
    </div>
</div>