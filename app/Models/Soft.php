<?php

namespace App\Models;


class Soft extends FishDataBase
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

    public static function all()
    {
        return collect([
            static::GSTOCK          => ['product' => Product::XEF, 'softType' => SoftType::ALMACEN_Y_COMPRAS, 'name' => 'Gstock'],
            static::CHEF_CONTROL    => ['product' => Product::XEF, 'softType' => SoftType::ALMACEN_Y_COMPRAS, 'name' => 'CHef Control'],
            static::DISTRITO_K      => ['product' => Product::XEF, 'softType' => SoftType::ALMACEN_Y_COMPRAS, 'name' => 'Distrito K'],
            static::XEF_GIRNET      => ['product' => Product::XEF, 'softType' => SoftType::BI_GESTION_DE_PERSONAL, 'name' => 'GIRnet'],
            static::REVO_FLOW       => ['product' => Product::XEF, 'softType' => SoftType::RESERVAS, 'name' => 'Revo Flow'],
            static::COVERMANAGER    => ['product' => Product::XEF, 'softType' => SoftType::RESERVAS, 'name' => 'CoverManager'],
            static::ELTENEDOR       => ['product' => Product::XEF, 'softType' => SoftType::RESERVAS, 'name' => 'ElTenedor'],
            static::RESTO           => ['product' => Product::XEF, 'softType' => SoftType::RESERVAS, 'name' => 'RESTO'],
            static::DELIVEROO       => ['product' => Product::XEF, 'softType' => SoftType::DELIVERY, 'name' => 'Deliveroo'],
            static::GLOVO           => ['product' => Product::XEF, 'softType' => SoftType::DELIVERY, 'name' => 'Glovo'],
            static::TSPOONLAB       => ['product' => Product::XEF, 'softType' => SoftType::RECETAS, 'name' => 'tSpoonLab'],
            static::RETAIL_GIRNET   => ['product' => Product::RETAIL, 'softType' => SoftType::BI_GESTION_DE_PERSONAL, 'name' => 'GIRnet'],
            static::PRESTASHOP      => ['product' => Product::RETAIL, 'softType' => SoftType::ECOMMERCE, 'name' => 'PrestaShop'],
            static::WOOCOMMERCE     => ['product' => Product::RETAIL, 'softType' => SoftType::ECOMMERCE, 'name' => 'WooCommerce'],
        ]);
    }

    public function softType()
    {
        return SoftType::find($this->reference['softType']);
    }
}
