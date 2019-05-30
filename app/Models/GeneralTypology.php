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
    const KIOSK                                         = 8;
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
            static::CAFETERIA                                    => ['product' => Product::XEF,     'name' => 'Cafetería',  'proposal' => Proposal::TIPO_CAFETERIA, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::BAR                                          => ['product' => Product::XEF,     'name' => 'Bar',        'proposal' => Proposal::TIPO_BAR, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::RESTAURANTE                                  => ['product' => Product::XEF,     'name' => 'Restaurante', 'proposal' => Proposal::TIPO_RESTAURANTE, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF, Proposal::REVO_KDS]],
            static::DISCOTECA                                    => ['product' => Product::XEF,     'name' => 'Discoteca',  'proposal' => Proposal::TIPO_DISCOTECA, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_XEF]],
            static::TAKE_AWAY                                    => ['product' => Product::XEF,     'name' => 'Take away',  'proposal' => Proposal::TIPO_TAKEAWAY, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS]],
            static::DELIVERY                                     => ['product' => Product::XEF,     'name' => 'Delivery',   'proposal' => Proposal::TIPO_DELIVERY, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS, Proposal::REVO_DDS]],
            static::HOTEL                                        => ['product' => Product::XEF,     'name' => 'Hotel',      'proposal' => Proposal::TIPO_HOTEL, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_KDS, Proposal::REVO_DDS,Proposal::REVO_KIOSK]],
//            static::KIOSK                                        => ['product' => Product::XEF,   'name' => 'Kiosk', 'proposal' => Proposal::TIPO_KIOSKO, 'related_proposals' => [14, Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::self::REVO_KDS]],
            static::XEF_PANADERIA                                => ['product' => Product::XEF,     'name' => 'Panadería',  'proposal' => Proposal::TIPO_PANADERIA_XEF,  'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL,Proposal::REVO_DISPLAY]],
            static::FOODTRUCK                                    => ['product' => Product::XEF,     'name' => 'Foodtruck',  'proposal' => Proposal::TIPO_FOODTRUCK, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::COMIDA_AL_PESO                               => ['product' => Product::XEF,     'name' => 'Comida al peso', 'proposal' => Proposal::TIPO_COMIDA, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL,Proposal::REVO_DISPLAY, Proposal::REVO_KDS]],
            static::SOLO_EVENTOS                                 => ['product' => Product::XEF,     'name' => 'Solo eventos', 'proposal' => Proposal::TIPO_EVENTOS],
            static::RETAIL_STORE                                 => ['product' => Product::RETAIL,  'name' => 'Retail store', 'proposal' => Proposal::TIPO_RETAIL_STORE, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::DISTRIBUCION_DE_PRODUCTOS_Y_FUERZA_COMERCIAL => ['product' => Product::RETAIL,  'name' => 'Distribución de productos y Fuerza comercial', 'proposal' => Proposal::TIPO_DISTRIBUCION_FUERZA, 'related_proposals' => [Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::AUTOVENTA_MOVILIDAD                          => ['product' => Product::RETAIL,  'name' => 'Autoventa / movilidad', 'proposal' => Proposal::TIPO_AUTOMOVILIDAD, 'related_proposals' => [Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::PELUQUERIA_ESTETICA                          => ['product' => Product::RETAIL,  'name' => 'Peluquería / estética', 'proposal' => Proposal::TIPO_PELUESTETICA, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_RETAIL]],
            static::RETAIL_PANADERIA                             => ['product' => Product::RETAIL,  'name' => 'Panadería', 'proposal' => Proposal::TIPO_PANADERIA_RETAIL, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::VENTA_GRANEL                                 => ['product' => Product::RETAIL, 'name' => 'Venta a granel', 'proposal' => Proposal::TIPO_VENTA_GRANEL, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::AVIACION_TRANSPORTE                          => ['product' => Product::RETAIL,  'name' => 'Aviación / transporte', 'proposal' => Proposal::TIPO_AVITRANSPORTE, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::EVENTOS_CORNERS                              => ['product' => Product::RETAIL,  'name' => 'Eventos / corners', 'proposal' => Proposal::TIPO_EVENTCORNERS, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL]],
            static::ESPECTACULOS                                 => ['product' => Product::RETAIL,  'name' => 'Espectáculos', 'proposal' => Proposal::TIPO_ESPECTACULOS, 'related_proposals' => [Proposal::REVO_INTOUCH, Proposal::REVO_STOCK, Proposal::REVO_CONTROL, Proposal::REVO_FLOW_RETAIL]],
        ]);
    }

    public function proposal()
    {
        return Proposal::find($this->proposal);
    }

    public function relatedProposals()
    {
        return collect($this->reference['related_proposals'])->map(function ($proposal) {
            return Proposal::find($proposal);
        });
    }
}
