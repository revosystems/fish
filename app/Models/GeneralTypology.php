<?php

namespace App\Models;

class GeneralTypology extends FishDataBase
{
    const CAFETERIA                                     = 1;
    const BAR                                           = 2;
    const RESTAURANTE                                   = 3;
    const DISCOTECA                                     = 4;
    const TAKE_AWAY                                     = 5;
    const DELIVERY                                      = 6;
    const HOTEL                                         = 7;
    const XEF_PANADERIA                                 = 9;
    const FOODTRUCK                                     = 10;
    const COMIDA_AL_PESO                                = 11;
    const SOLO_EVENTOS                                  = 12;
    const RETAIL_STORE                                  = 13;
    const DISTRIBUCION_DE_PRODUCTOS_Y_FUERZA_COMERCIAL  = 14;
    const AUTOVENTA_MOVILIDAD                           = 15;
    const PELUQUERIA_ESTETICA                           = 16;
    const RETAIL_PANADERIA                              = 17;
    const VENTA_GRANEL                                  = 18;
    const AVIACION_TRANSPORTE                           = 19;
    const EVENTOS_CORNERS                               = 20;
    const ESPECTACULOS                                  = 21;

    public static function all()
    {
        return collect([
            static::CAFETERIA                                    => ['product' => Product::XEF,     'name' => 'Cafetería',  'proposals' => [Proposal::TIPO_CAFETERIA, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::BAR                                          => ['product' => Product::XEF,     'name' => 'Bar',        'proposals' => [Proposal::TIPO_BAR, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::RESTAURANTE                                  => ['product' => Product::XEF,     'name' => 'Restaurante', 'proposals' => [Proposal::TIPO_RESTAURANTE, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF, Proposal::REVO_KDS]],
            static::DISCOTECA                                    => ['product' => Product::XEF,     'name' => 'Discoteca',  'proposals' => [Proposal::TIPO_DISCOTECA, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::TAKE_AWAY                                    => ['product' => Product::XEF,     'name' => 'Take away',  'proposals' => [Proposal::TIPO_TAKEAWAY, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS]],
            static::DELIVERY                                     => ['product' => Product::XEF,     'name' => 'Delivery',   'proposals' => [Proposal::TIPO_DELIVERY, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS, Proposal::REVO_DDS]],
            static::HOTEL                                        => ['product' => Product::XEF,     'name' => 'Hotel',      'proposals' => [Proposal::TIPO_HOTEL, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS, Proposal::REVO_DDS,Proposal::REVO_KIOSK]],
            static::XEF_PANADERIA                                => ['product' => Product::XEF,     'name' => 'Panadería',  'proposals' => [Proposal::TIPO_PANADERIA_XEF, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL,Proposal::REVO_DISPLAY]],
            static::FOODTRUCK                                    => ['product' => Product::XEF,     'name' => 'Foodtruck',  'proposals' => [Proposal::TIPO_FOODTRUCK, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::COMIDA_AL_PESO                               => ['product' => Product::XEF,     'name' => 'Comida al peso', 'proposals' => [Proposal::TIPO_COMIDA, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL,Proposal::REVO_DISPLAY, Proposal::REVO_KDS]],
            static::SOLO_EVENTOS                                 => ['product' => Product::XEF,     'name' => 'Solo eventos', 'proposals' => [Proposal::TIPO_EVENTOS]],
            static::RETAIL_STORE                                 => ['product' => Product::RETAIL,  'name' => 'Retail store', 'proposals' => [Proposal::TIPO_RETAIL_STORE, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::DISTRIBUCION_DE_PRODUCTOS_Y_FUERZA_COMERCIAL => ['product' => Product::RETAIL,  'name' => 'Distribución de productos y Fuerza comercial', 'proposals' => [Proposal::TIPO_DISTRIBUCION_FUERZA, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::AUTOVENTA_MOVILIDAD                          => ['product' => Product::RETAIL,  'name' => 'Autoventa / movilidad', 'proposals' => [Proposal::TIPO_AUTOMOVILIDAD, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::PELUQUERIA_ESTETICA                          => ['product' => Product::RETAIL,  'name' => 'Peluquería / estética', 'proposals' => [Proposal::TIPO_PELUESTETICA, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_RETAIL]],
            static::RETAIL_PANADERIA                             => ['product' => Product::RETAIL,  'name' => 'Panadería', 'proposals' => [Proposal::TIPO_PANADERIA_RETAIL, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::VENTA_GRANEL                                 => ['product' => Product::RETAIL, 'name' => 'Venta a granel', 'proposals' => [Proposal::TIPO_VENTA_GRANEL, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::AVIACION_TRANSPORTE                          => ['product' => Product::RETAIL,  'name' => 'Aviación / transporte', 'proposals' => [Proposal::TIPO_AVITRANSPORTE, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::EVENTOS_CORNERS                              => ['product' => Product::RETAIL,  'name' => 'Eventos / corners', 'proposals' => [Proposal::TIPO_EVENTCORNERS, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::ESPECTACULOS                                 => ['product' => Product::RETAIL,  'name' => 'Espectáculos', 'proposals' => [Proposal::TIPO_ESPECTACULOS, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_RETAIL]],
        ]);
    }

    public function proposals()
    {
        return collect($this->reference['proposals'])->map(function ($proposal) {
            return Proposal::find($proposal);
        });
    }
}
