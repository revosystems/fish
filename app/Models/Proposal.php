<?php

namespace App\Models;

class Proposal extends FishDataBase
{
    const REVO_XEF_BASIC            = 1;
    const REVO_XEF_PLUS             = 2;
    const REVO_XEF_PRO              = 3;
    const REVO_RETAIL               = 4;
    const REVO_INTOUCH              = 5;
    const REVO_BACK                 = 6;
    const REVO_MASTER               = 7;
    const REVO_CONTROL              = 8;
    const REVO_DDS                  = 9;
    const REVO_DISPLAY              = 10;
    const REVO_FLOW_XEF             = 11;
    const REVO_FLOW_RETAIL          = 12;
    const REVO_KDS                  = 13;
    const REVO_KIOSK                = 14;
    const REVO_STOCK                = 15;
    const PMS                       = 16;
    const ERP                       = 17;
    const POS_LEGACY                = 18;
    const TIPO_BAR                  = 19;
    const TIPO_CAFETERIA            = 20;
    const TIPO_RESTAURANTE          = 21;
    const TIPO_HOTEL                = 22;
    const TIPO_TAKEAWAY             = 23;
    const TIPO_DELIVERY             = 24;
//    const TIPO_KIOSKO               = 25;
    const TIPO_DISCOTECA            = 26;
    const TIPO_PANADERIA_XEF        = 27;
    const TIPO_PANADERIA_RETAIL     = 28;
    const TIPO_FOODTRUCK            = 29;
    const TIPO_COMIDA               = 30;
    const TIPO_EVENTOS              = 31;
    const TIPO_AUTOMOVILIDAD        = 32;
    const TIPO_AVITRANSPORTE        = 33;
    const TIPO_DISTRIBUCION_FUERZA  = 34;
    const TIPO_ESPECTACULOS         = 35;
    const TIPO_EVENTCORNERS         = 36;
    const TIPO_FUERZACOMERCIAL      = 37;
    const TIPO_PELUESTETICA         = 38;
    const TIPO_RETAIL_STORE         = 39;
    const TIPO_VENTA_GRANEL         = 40;
    const PROFILES                  = 41;
    const SOFT_ALMACOMPRAS          = 42;
    const SOFT_BIPERSONAL           = 43;
    const SOFT_DELIVERY             = 44;
    const SOFT_ECOMMERCE            = 45;
    const SOFT_RECETAS              = 46;
    const SOFT_RESERVAS             = 47;
    const POS_CLOUD                 = 49;
    const POS_IOS                   = 50;
    const SOFT_OTHER                = 51;

    public static function all()
    {
        return collect([
            static::REVO_XEF_BASIC           => ['key' => 'revo_xef_basic',           'name' => 'Revo XEF basic'],
            static::REVO_XEF_PLUS            => ['key' => 'revo_xef_plus',            'name' => 'Revo XEF plus'],
            static::REVO_XEF_PRO             => ['key' => 'revo_xef_pro',             'name' => 'Revo XEF pro'],
            static::REVO_RETAIL              => ['key' => 'revo_retail',              'name' => 'Revo RETAIL'],
            static::REVO_INTOUCH             => ['key' => 'revo_intouch',             'name' => 'Revo InTOUCH'],
            static::REVO_BACK                => ['key' => 'revo_back',                'name' => 'Revo BACK'],
            static::REVO_MASTER              => ['key' => 'revo_master',              'name' => 'Revo MASTER'],
            static::REVO_CONTROL             => ['key' => 'revo_control',             'name' => 'Revo CONTROL'],
            static::REVO_DDS                 => ['key' => 'revo_dds',                 'name' => 'Revo DDS'],
            static::REVO_DISPLAY             => ['key' => 'revo_display',             'name' => 'Revo DISPLAY'],
            static::REVO_FLOW_XEF            => ['key' => 'revo_flow_xef',            'name' => 'Revo FLOW'],
            static::REVO_FLOW_RETAIL         => ['key' => 'revo_flow_retail',         'name' => 'Revo FLOW'],
            static::REVO_KDS                 => ['key' => 'revo_kds',                 'name' => 'Revo KDS'],
            static::REVO_KIOSK               => ['key' => 'revo_kiosk',               'name' => 'Revo KIOSK'],
            static::REVO_STOCK               => ['key' => 'revo_stock',               'name' => 'Revo STOCK'],
            static::PMS                      => ['key' => 'pms',                      'name' => 'Integraciones PMS'],
            static::ERP                      => ['key' => 'erp',                      'name' => 'Integraciones ERP'],
            static::POS_LEGACY               => ['key' => 'pos_legacy',               'name' => 'REVO vs Legacy/On-premise Solutions'],
            static::TIPO_BAR                 => ['key' => 'tipo_bar',                 'name' => 'Bar'],
            static::TIPO_CAFETERIA           => ['key' => 'tipo_cafeteria',           'name' => 'Cafetería'],
            static::TIPO_RESTAURANTE         => ['key' => 'tipo_restaurante',         'name' => 'Restaurante'],
            static::TIPO_HOTEL               => ['key' => 'tipo_hotel',               'name' => 'Hotel'],
            static::TIPO_TAKEAWAY            => ['key' => 'tipo_takeaway',            'name' => 'Take Away'],
            static::TIPO_DELIVERY            => ['key' => 'tipo_delivery',            'name' => 'Delivery'],
            static::TIPO_DISCOTECA           => ['key' => 'tipo_discoteca',           'name' => 'Discoteca'],
            static::TIPO_PANADERIA_XEF       => ['key' => 'tipo_panaderia_xef',       'name' => 'Panadería'],
            static::TIPO_PANADERIA_RETAIL    => ['key' => 'tipo_panaderia_retail',    'name' => 'Panadaría'],
            static::TIPO_FOODTRUCK           => ['key' => 'tipo_foodtruck',           'name' => 'Foodtruck'],
            static::TIPO_COMIDA              => ['key' => 'tipo_comida',              'name' => 'Comida a peso'],
            static::TIPO_EVENTOS             => ['key' => 'tipo_eventos',             'name' => 'Solo eventos'],
            static::TIPO_AUTOMOVILIDAD       => ['key' => 'tipo_automovilidad',       'name' => 'Autoventa / movilidad'],
            static::TIPO_AVITRANSPORTE       => ['key' => 'tipo_avitransporte',       'name' => 'Aviación / transporte'],
            static::TIPO_DISTRIBUCION_FUERZA => ['key' => 'tipo_distribucion_fuerza', 'name' => 'Distribución de productos y Fuerza comercial'],
            static::TIPO_ESPECTACULOS    => ['key' => 'tipo_espectaculos',        'name' => 'Espectáculos'],
            static::TIPO_EVENTCORNERS    => ['key' => 'tipo_eventcorners',        'name' => 'Eventos / corners'],
            static::TIPO_FUERZACOMERCIAL => ['key' => 'tipo_fuerzacomercial',     'name' => 'Fuerza comercial', '-', 'tipo_fuerzacomercial'],
            static::TIPO_PELUESTETICA    => ['key' => 'tipo_peluestetica',        'name' => 'Peluquería / estética'],
            static::TIPO_RETAIL_STORE    => ['key' => 'tipo_retailstore', 'name' => 'Retail Store'],
            static::TIPO_VENTA_GRANEL    => ['key' => 'tipo_venta_granel', 'name' => 'Venta a granel'],
            static::PROFILES             => ['key' => 'profiles',                 'name' => 'Perfiles'],
            static::SOFT_ALMACOMPRAS     => ['key' => 'soft_almacompras',         'name' => 'Integraciones - Almacén y compras'],
            static::SOFT_BIPERSONAL      => ['key' => 'soft_bipersonal',          'name' => 'Integraciones - Business Intelligence / Gestión de personal'],
            static::SOFT_DELIVERY        => ['key' => 'soft_delivery',            'name' => 'Integraciones - Delivery'],
            static::SOFT_ECOMMERCE           => ['key' => 'soft_ecommerce',           'name' => 'Integraciones - eCommerce'],
            static::SOFT_RECETAS             => ['key' => 'soft_recetas',             'name' => 'Integraciones - Recetas'],
            static::SOFT_RESERVAS            => ['key' => 'soft_reservas',            'name' => 'Integraciones - Reservas'],
            static::POS_CLOUD                => ['key' => 'pos_cloud',                'name' => 'REVO vs Android u otros sistemas operativos'],
            static::POS_IOS                  => ['key' => 'pos_ios',                  'name' => 'REVO vs Otros partners de iOS'],
            static::SOFT_OTHER               => ['key' => 'soft_other',               'name' => 'Integraciones - Otras']
        ]);
    }

    public function bladeName()
    {
        return $this->reference['key'];
    }

    public function proposals()
    {
        $proposals = collect();
        $proposals->push($this->posType()->proposal());
        $typologyProposals = $this->generalTypology()->proposals();
        $proposals->push($typologyProposals->first());
        $proposals->push($this->productProposal());
        if ($this->propertySpace()->needProfiles()) {
            $proposals->push(Proposal::find(Proposal::PROFILES));
        }
        $typologyProposals->slice(1)->each(function ($proposal) use ($proposals) {
            $proposals->push($proposal);
        });
        $proposals->push(Proposal::find($this->property_quantity > 1 ? Proposal::REVO_MASTER : Proposal::REVO_BACK));
        if ($this->erp || $this->erp_other) {
            $proposals->push(Proposal::find(Proposal::ERP));
        }
        if ($this->xef_pms || $this->pms_other) {
            $proposals->push(Proposal::find(Proposal::PMS));
        }

        if ($this->erp || $this->erp_other) {
            $proposals->push(Proposal::find(Proposal::ERP));
        }

        if ($this->soft > 0) {
            $proposals->push(Proposal::find($this->soft()->softType()->proposal()));
        } elseif ($this->soft_other) {
            $proposals->push(Proposal::find(Proposal::SOFT_OTHER));
        }
        return $proposals->reject(null);
    }
}
