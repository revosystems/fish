<?php

namespace App\Models;

class PropertySpace extends FishDataBase
{
    const XEF_PROPERTY_SPACE_NO                          = 1;
    const XEF_PROPERTY_SPACE_OUTDOOR                     = 2;
    const XEF_PROPERTY_SPACE_SPLITTED_ROOMS              = 3;
    const RETAIL_PROPERTY_SPACE_STANDARD                 = 4;
    const RETAIL_PROPERTY_SPACE_DIFFERENT_ROOMS          = 5;
    const RETAIL_PROPERTY_SPACE_DIFFERENT_SPLITTED_ROOMS = 6;

    public static function all($columns = [])
    {
        return collect([
            static::XEF_PROPERTY_SPACE_NO                           => ['product' => Lead::PRODUCT_XEF,     'name' => 'No'],
            static::XEF_PROPERTY_SPACE_OUTDOOR                      => ['product' => Lead::PRODUCT_XEF,     'name' => 'Terraza'],
            static::XEF_PROPERTY_SPACE_SPLITTED_ROOMS               => ['product' => Lead::PRODUCT_XEF,     'name' => 'Comedores separados'],
            static::RETAIL_PROPERTY_SPACE_STANDARD                  => ['product' => Lead::PRODUCT_RETAIL,  'name' => 'Estándar'],
            static::RETAIL_PROPERTY_SPACE_DIFFERENT_ROOMS           => ['product' => Lead::PRODUCT_RETAIL,  'name' => 'Diferentes áreas / plantas'],
            static::RETAIL_PROPERTY_SPACE_DIFFERENT_SPLITTED_ROOMS  => ['product' => Lead::PRODUCT_RETAIL,  'name' => 'Locales separados'],
        ]);
    }
}
