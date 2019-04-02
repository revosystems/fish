<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>PROPUESTA {{$trade_name}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pdf.css') }}">

    </head>
    <body class="pdf">

        <img src="{{ asset('images/revo-icon-'.$revo_version_css.'.png') }}" class="revo-icon" />
        <img src="{{ asset('images/erre.png') }}" class="revo-erre" />

        <div class="revo-bg {{$revo_version_css}}"></div>
        <img src="{{ asset('images/orange.jpg') }}" class="orange-hero" />
        <img src="{{ asset('images/revo-logo-'.$revo_version_css.'.png') }}" class="revo-logo {{$revo_version_css}}" />

        <div class="trade-name title absolute ">{{$trade_name}} | <span class="text-capitalize">{{$client_name}} {{$client_surname1}}</span></div>
        <div class="client-name title absolute">{{$client_name}}</div>

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
                        <td>{{$trade_name}}</td>
                    </tr>
                    <tr>
                        <td>Nombre y apellidos</td>
                        <td>{{$client_name}}</td>
                    </tr>
                    <tr>
                        <td>Primer apellido</td>
                        <td>{{$client_surname1}}</td>
                    </tr>
                    <tr>
                        <td>Segundo apellido</td>
                        <td>{{$client_surname2}}</td>
                    </tr>
                    <tr>
                        <td>Correo electrónico</td>
                        <td>{{$client_email}}</td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{$client_phone}}</td>
                    </tr>
                    <tr>
                        <td>Población</td>
                        <td>{{$client_city}}</td>
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
                        <td>{{$property_qty}}</td>
                    </tr>
                    <tr>
                        <td>Espacios</td>
                        <td>{{$property_spaces}}</td>
                    </tr>
                    @if($type==1)
                        <tr>
                            <td>Aforo del local</td>
                            <td>{{$xef_property_capacity}}</td>
                        </tr>
                    @endif
                    @if($type==2)
                        <tr>
                            <td>Nº empleados / comerciales</td>
                            <td>{{$property_staff_quantity}}</td>
                        </tr>
                    @endif

                    @if($type==1)
                        <tr>
                            <td>Nº comanderos entorno crítico</td>
                            <td>{{$xef_pos_critical_quantity}}</td>
                        </tr>
                        <tr>
                            <td>Nº de cajas de cobro</td>
                            <td>{{$xef_cash_quantity}}</td>
                        </tr>
                        <tr>
                            <td>Nº de impresoras en cocina</td>
                            <td>{{$xef_printers_quantity}}</td>
                        </tr>
                        <tr>
                            <td>Desea trabajar con pantallas en cocina</td>
                            <td>{{$xef_kds}}</td>
                        </tr>
                    @endif
                    @if($type==2)
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
                    @if($franchise_pos_external!=null)
                        <tr>
                            <td>Autorizado para trabajar con TPV externo</td>
                            <td>{{$franchise_pos_external}}</td>
                        </tr>
                    @endif
                    @if($xef_pms!=null)
                        <tr>
                            <td>PMS actual</td>
                            <td>{{$xef_pms}}</td>
                        </tr>
                    @endif
                    @if($erp!=null)
                        <tr>
                            <td>ERP actual</td>
                            <td>{{$erp}}</td>
                        </tr>
                    @endif
                    @if($software!="")
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
        <div class="hardware" style="{{  $type === 2 ? "display:none" : "display:block" }}">
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
        <div  class="hardware" style="{{  $type === 1 ? "display:none" : "display:block" }}">
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