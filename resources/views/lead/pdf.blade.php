<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>PROPUESTA {{$tradeName}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pdf.css') }}">

    </head>
    <body class="pdf">

        <img src="{{ asset("images/revo-icon-{$revoVersionCss}.png") }}" class="revo-icon" />
        <img src="{{ asset('images/erre.png') }}" class="revo-erre" />

        <div class="revo-bg {{$revoVersionCss}}"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange-hero" />
        <img src="{{ asset("images/revo-logo-{$revoVersionCss}.png") }}" class="revo-logo {{$revoVersionCss}}" />

        <div class="trade-name title absolute ">{{$tradeName}} | <span class="text-capitalize">{{$clientName}} {{$clientSurname1}}</span></div>
        <div class="client-name title absolute">{{$clientName}}</div>

        <div class="page_break"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange" />
        <div class="profile title absolute">PROPUESTA</div>
        <div class="divider">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <table class="table profile-table">
                    <thead>
                    <tr>
                        <th class="title">CLIENTE</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Nombre comercial</td>
                        <td>{{$tradeName}}</td>
                    </tr>
                    <tr>
                        <td>Nombre y apellidos</td>
                        <td>{{$clientName}}</td>
                    </tr>
                    <tr>
                        <td>Primer apellido</td>
                        <td>{{$clientSurname1}}</td>
                    </tr>
                    <tr>
                        <td>Segundo apellido</td>
                        <td>{{$clientSurname2}}</td>
                    </tr>
                    <tr>
                        <td>Correo electrónico</td>
                        <td>{{$clientEmail}}</td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{$clientPhone}}</td>
                    </tr>
                    <tr>
                        <td>Población</td>
                        <td>{{$clientCity}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="title">SOFTWARE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($proposals as $item)
                        <tr>
                            <td>
                                {!!$item->name!!}
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="title">HARDWARE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hardware as $item)
                        <tr>
                            <td>
                                {!!$item!!}
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page_break"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange" alt="Características"/>
        <div class="profile title absolute">CARACTERÍSTICAS</div>
        <div class="divider">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table specs-table">
                    <tbody>
                    <tr>
                        <td>Perfil</td>
                        <td>{{$profile}}</td>
                    </tr>
                    <tr>
                        <td>Tipología</td>
                        <td>{{$typology}}</td>
                    </tr>
                    <tr>
                        <td>Es franquicia</td>
                        <td>{{$franchise}}</td>
                    </tr>
                    <tr>
                        <td>Nº de locales</td>
                        <td>{{$propertyQty}}</td>
                    </tr>
                    <tr>
                        <td>Espacios</td>
                        <td>{{$propertySpaces}}</td>
                    </tr>
                    @if($type == App\Models\LeadType::XEF)
                        <tr>
                            <td>Aforo del local</td>
                            <td>{{$xefPropertyCapacity}}</td>
                        </tr>
                    @endif
                    @if($type == App\Models\LeadType::RETAIL)
                        <tr>
                            <td>Nº empleados / comerciales</td>
                            <td>{{$propertyStaffQuantity}}</td>
                        </tr>
                    @endif

                    @if($type == App\Models\LeadType::XEF)
                        <tr>
                            <td>Nº comanderos entorno crítico</td>
                            <td>{{$xefPosCriticalQuantity}}</td>
                        </tr>
                        <tr>
                            <td>Nº de cajas de cobro</td>
                            <td>{{$xefCashQuantity}}</td>
                        </tr>
                        <tr>
                            <td>Nº de impresoras en cocina</td>
                            <td>{{$xefPrintersQuantity}}</td>
                        </tr>
                        <tr>
                            <td>Desea trabajar con pantallas en cocina</td>
                            <td>{{$xefKds}}</td>
                        </tr>
                    @endif
                    @if($type == App\Models\LeadType::RETAIL)
                        <tr>
                            <td>Requiere venta delante del cliente final</td>
                            <td>{{$retail_sale_mode}}</td>
                        </tr>
                        <tr>
                            <td>Donde se vende</td>
                            <td>{{$retail_sale_location}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Dispone de dispositivos</td>
                        <td>{!! $devices !!}</td>
                    </tr>

                    <tr>
                        <td>TPV actual</td>
                        <td>{{$pos}}</td>
                    </tr>
                    @if($franchisePosExternal)
                        <tr>
                            <td>Autorizado para trabajar con TPV externo</td>
                            <td>{{$franchisePosExternal}}</td>
                        </tr>
                    @endif
                    @if($xefPms)
                        <tr>
                            <td>PMS actual</td>
                            <td>{{$xefPms}}</td>
                        </tr>
                    @endif
                    @if($erp)
                        <tr>
                            <td>ERP actual</td>
                            <td>{{$erp}}</td>
                        </tr>
                    @endif
                    @if($software)
                        <tr>
                            <td>Otro software del cliente</td>
                            <td>{{$software}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>



        <div class="page_break"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange" />
        <div class="profile title absolute">ARGUMENTARIOS</div>
        <div class="divider">&nbsp;</div>

        @foreach($proposals as $item)
            <div class="arguments">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="title">{!!$item->name!!}</h3>
                        {!!$item->description!!}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="page_break"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange" />
        <div class="profile title absolute">HARDWARE Y ACCESORIOS</div>
        <div class="divider">&nbsp;</div>
        <div class="hardware" style="{{  $type == App\Models\LeadType::RETAIL ? "display:none" : "display:block" }}">
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_cash')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.ipad_large_type_cash')}}
                    <span class="product block text-center">{{__('app.hardware.ipad_large')}}</span>
                    <div class="text-center"><img src="{{ asset(__('app.hardware.ipad_large_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.ipad_stand_type_cash')}}
                    <span class="product block text-center">{{__('app.hardware.ipad_stand')}}</span>
                    <div class="text-center"><img src="{{ asset(__('app.hardware.ipad_stand_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_pos')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ __('app.hardware.ipad_iphone_type_pos') }}
                    <span class="product block text-center">{{ __('app.hardware.ipad_iphone') }}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.ipad_iphone_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{ __('app.hardware.ipad_cover_type_pos') }}
                    <span class="product block text-center"> {{ __('app.hardware.ipad_cover') }}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.ipad_cover_img')) }}"></div>
                </div>
            </div>
            <div class="page_break"></div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_kds')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ __('app.hardware.ipad_large_type_kds') }}
                    <span class="product block text-center"> {{ __('app.hardware.ipad_large') }}</span>
                    <div class=" text-center"><img src="{{ asset( __('app.hardware.ipad_large_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{ __('app.hardware.kds_stand_type_kds') }}
                    <span class="product block text-center"> {{ __('app.hardware.kds_stand') }}</span>
                    <div class=" text-center"><img src="{{ asset( __('app.hardware.kds_stand_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_kiosk')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ __('app.hardware.ipad_large_type_kiosk') }}
                    <span class="product block text-center">{{ __('app.hardware.ipad_large') }}</span>
                    <div class=" text-center"><img src="{{ asset( __('app.hardware.ipad_large_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.kiosk_stand_type_kiosk')}}
                    <span class="product block text-center">{{__('app.hardware.kiosk_stand')}}</span>
                    <div class=" text-center"><img src="{{ asset( __('app.hardware.kiosk_stand_img')) }}"></div>
                </div>
            </div>
            <div class="page_break"></div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_payment')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.itos_type_payment')}}
                    <span class="product block text-center">{{__('app.hardware.itos')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.itos_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.infinity_type_payment')}}
                    <span class="product block text-center">{{__('app.hardware.infinity')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.infinity_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_printers')}}</h3>
                    {{__('app.hardware.star_type_printers')}}
                    <span class="product block text-center">{{__('app.hardware.star')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.star_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_wifi')}}</h3>
                    {{__('app.hardware.ubiquiti_type_wifi')}}
                    <span class="product block text-center"> {{__('app.hardware.ubiquiti')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.ubiquiti_img')) }}"></div>
                </div>
            </div>
            <div class="page_break"></div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_balances')}}</h3>
                    {{__('app.hardware.dibal_type_balances')}}
                    <span class="product block text-center">{{__('app.hardware.dibal')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.dibal_img')) }}"></div>
                </div>
            </div>
        </div>
        <div  class="hardware" style="{{ $type == App\Models\LeadType::XEF ? "display:none" : "display:block" }}">
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_cash_display')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.ipad_large_type_display')}}
                    <span class="product block text-center">{{ __('app.hardware.ipad_large') }}</span>
                    <div class=" text-center"><img src="{{ asset( __('app.hardware.ipad_large_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.ipad_stand_type_display')}}
                    <span class="product block text-center">{{__('app.hardware.ipad_stand')}}</span>
                    <div class=" text-center"> <img src="{{ asset(__('app.hardware.ipad_stand_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_cash_mobile')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.ipad_ipmini_type_cmobile')}}
                    <span class="product block text-center">{{__('app.hardware.ipad_ipmini')}}</span>
                    <div class="text-center"><img src="{{ asset(__('app.hardware.ipad_ipmini_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.ipad_cover_type_cmobile')}}
                    <span class="product block text-center"> {{__('app.hardware.ipad_cmobile_cover')}}</span>
                    <div class="text-center"><img src="{{ asset(__('app.hardware.ipad_cover_cmobile_img')) }}"></div>
                </div>
            </div>
            <div class="page_break"></div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_payment')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.itos_type_payment')}}
                    <span class="product block text-center">{{__('app.hardware.itos')}}</span>
                    <div class=" text-center"> <img src="{{ asset(__('app.hardware.itos_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.infinity_type_payment')}}
                    <span class="product block text-center">{{__('app.hardware.infinity')}}</span>
                    <div class=" text-center"> <img src="{{ asset(__('app.hardware.infinity_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h3 class="title">{{__('app.hardware.type_balances')}}</h3></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{__('app.hardware.dibal_type_balances')}}
                    <span class="product block text-center">{{__('app.hardware.dibal')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.dibal_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    {{__('app.hardware.motorola_type_balances')}}
                    <span class="product block text-center">{{__('app.hardware.motorola')}}</span>
                    <div class=" text-center"> <img src="{{ asset(__('app.hardware.motorola_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_warehouse')}}</h3>
                    {{__('app.hardware.ipad_ipmini_type_ware')}}
                    <span class="product block text-center">{{__('app.hardware.ipad_ipmini')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.ipad_ipmini_img')) }}"></div>
                </div>
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_printers')}}</h3>
                    {{__('app.hardware.star_type_printers')}}
                    <span class="product block text-center">{{__('app.hardware.star')}}</span>
                    <div class=" text-center"><img src="{{ asset(__('app.hardware.star_img')) }}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">{{__('app.hardware.type_wifi')}}</h3>
                    {{__('app.hardware.ubiquiti_type_wifi')}}
                    <span class="product block text-center">{{__('app.hardware.ubiquiti')}}</span>
                    <div class=" text-center"> <img src="{{ asset(__('app.hardware.ubiquiti_img')) }}"></div>
                </div>
            </div>
        </div>
            <div class="page_break"></div>
        <div class="revo-bg end"></div>
       <img src="{{ asset('images/revo.png') }}" class="revo" />

    </body>
</html>