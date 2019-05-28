<?php

namespace App\Models;


class LeadSoft
{
    const GSTOCK        = 1;
    const CHEF_CONTROL  = 2;
    const DISTRITO_K    = 3;
    const RETAIL_GIRNET = 4;
    const REVO_FLOW     = 5;
    const COVERMANAGER  = 6;
    const ELTENEDOR     = 7;
    const RESTO         = 8;
    const DELIVEROO     = 9;
    const GLOVO         = 10;
    const TSPOONLAB     = 11;
    const XEF_GIRNET    = 12;
    const PRESTASHOP    = 13;
    const WOOCOMMERCE   = 14;

    public static function types()
    {
        return collect([
            static::GSTOCK          => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::ALMACEN_Y_COMPRAS,      'name' => 'Gstock'],
            static::CHEF_CONTROL    => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::ALMACEN_Y_COMPRAS,      'name' => 'CHef Control'],
            static::DISTRITO_K      => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::ALMACEN_Y_COMPRAS,      'name' => 'Distrito K'],
            static::XEF_GIRNET      => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::BI_GESTION_DE_PERSONAL, 'name' => 'GIRnet'],
            static::REVO_FLOW       => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::RESERVAS,               'name' => 'Revo Flow'],
            static::COVERMANAGER    => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::RESERVAS,               'name' => 'CoverManager'],
            static::ELTENEDOR       => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::RESERVAS,               'name' => 'ElTenedor'],
            static::RESTO           => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::RESERVAS,               'name' => 'RESTO'],
            static::DELIVEROO       => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::DELIVERY,               'name' => 'Deliveroo'],
            static::GLOVO           => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::DELIVERY,               'name' => 'Glovo'],
            static::TSPOONLAB       => ['product' => Lead::PRODUCT_XEF,     'softType' => LeadSoftType::RECETAS,                'name' => 'tSpoonLab'],
            static::RETAIL_GIRNET   => ['product' => Lead::PRODUCT_RETAIL,  'softType' => LeadSoftType::BI_GESTION_DE_PERSONAL, 'name' => 'GIRnet'],
            static::PRESTASHOP      => ['product' => Lead::PRODUCT_RETAIL,  'softType' => LeadSoftType::ECOMMERCE,              'name' => 'PrestaShop'],
            static::WOOCOMMERCE     => ['product' => Lead::PRODUCT_RETAIL,  'softType' => LeadSoftType::ECOMMERCE,              'name' => 'WooCommerce'],
        ]);
    }
}
