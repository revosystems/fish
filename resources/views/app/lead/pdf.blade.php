@php
    $platform = auth()->user()->platform();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>PROPUESTA {{$lead->trade_name}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('modules/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pdf.css') }}">
    </head>
    <body class="pdf ">

        <img src="{{ asset("images/revo-icon-{$revoVersionCss}.png") }}" class="revo-icon" />
        <img src="{{ asset('images/erre.png') }}" class="revo-erre" />

        <div class="revo-bg {{$revoVersionCss}}"></div>

        <img src="{{ asset("images/{$platform}.jpg") }}" class="{{$platform}}-hero" />
        <img src="{{ asset("images/revo-logo-{$revoVersionCss}.png") }}" class="revo-logo {{$revoVersionCss}}" />

        <div class="trade-name title absolute ">{{$lead->trade_name}} | <span class="text-capitalize">{{$lead->name}} {{$lead->surname1}}</span></div>
        <div class="client-name title absolute">{{$lead->name}}</div>

        <div class="page_break"></div>

        <img src="{{ asset("images/{$platform}.jpg") }}" class="{{$platform}}" />

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
                        @include('app.lead.components.pdf-table-row', ['title' => 'Nombre comercial', 'value' => $lead->trade_name])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Nombre y apellidos', 'value' => $lead->name])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Primer apellido', 'value' => $lead->surname1])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Segundo apellido', 'value' => $lead->surname2])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Correo electrónico', 'value' => $lead->email])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Teléfono', 'value' => $lead->phone])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Población', 'value' => $lead->city])
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
                    @foreach($lead->hardware() as $item)
                        <tr>
                            <td>
                                {{ $item }}
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page_break"></div>
        <img src="{{ asset("images/{$platform}.jpg") }}" class="{{$platform}}" />

        <div class="profile title absolute">CARACTERÍSTICAS</div>
        <div class="divider">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table specs-table">
                    <tbody>
                    @include('app.lead.components.pdf-table-row', ['title' => 'Perfil', 'value' => $revoVersion])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Tipología', 'value' => $typology])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Es franquicia', 'value' => $franchise])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Nº de locales', 'value' => $lead->property_quantity])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Espacios', 'value' => $propertySpace])
                    @include('app.lead.components.pdf-table-row', ['title' => $product == App\Models\Product::XEF ? 'Aforo del local' : 'Nº empleados / comerciales', 'value' => $lead->property_capacity])
                    @if($product == App\Models\Product::XEF)
                        @include('app.lead.components.pdf-table-row', ['title' => 'Nº comanderos entorno crítico', 'value' => $xefPosCriticalQuantity])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Nº de cajas de cobro', 'value' => $xefCashQuantity])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Nº de impresoras en cocina', 'value' => $xefPrintersQuantity])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Desea trabajar con pantallas en cocina', 'value' => $xefKds])
                    @endif
                    @if($product == App\Models\Product::RETAIL)
                        @include('app.lead.components.pdf-table-row', ['title' => 'Requiere venta delante del cliente final', 'value' => $lead->retail_sale_mode])
                        @include('app.lead.components.pdf-table-row', ['title' => 'Donde se vende', 'value' => $lead->retail_sale_location])
                    @endif
                    @include('app.lead.components.pdf-table-row', ['title' => 'Dispone de dispositivos', 'value' => $devices])
                    @include('app.lead.components.pdf-table-row', ['title' => 'TPV actual', 'value' => $pos])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Autorizado para trabajar con TPV externo', 'value' => $canUseAnotherPos])
                    @include('app.lead.components.pdf-table-row', ['title' => 'PMS actual', 'value' => $xefPms])
                    @include('app.lead.components.pdf-table-row', ['title' => 'ERP actual', 'value' => $erp])
                    @include('app.lead.components.pdf-table-row', ['title' => 'Otro software del cliente', 'value' => $software])
                    </tbody>
                </table>
            </div>
        </div>



        <div class="page_break"></div>
        <img src="{{ asset("images/{$platform}.jpg") }}" class="{{ $platform }}" />
        <div class="profile title absolute">ARGUMENTARIOS</div>
        <div class="divider">&nbsp;</div>

        @foreach($proposals as $item)
            <div class="arguments">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="title">{!!$item->name!!}</h3>
                        @include("app.proposals.{$item->key}")
                    </div>
                </div>
            </div>
        @endforeach

        <div class="page_break"></div>
        <img src="{{ asset("images/{$platform}.jpg") }}" class="{{ $platform }}" />
        <div class="profile title absolute">HARDWARE Y ACCESORIOS</div>
        <div class="divider">&nbsp;</div>
        <div class="hardware" style="{{  $product == App\Models\Product::RETAIL ? "display:none" : "display:block" }}">
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
        <div  class="hardware" style="{{ $product == App\Models\Product::XEF ? "display:none" : "display:block" }}">
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