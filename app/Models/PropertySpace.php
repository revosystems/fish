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
            static::XEF_PROPERTY_SPACE_NO                           => ['product' => Product::XEF,     'name' => 'Una única Sala'],
            static::XEF_PROPERTY_SPACE_OUTDOOR                      => ['product' => Product::XEF,     'name' => 'Sala + Terraza'],
            static::XEF_PROPERTY_SPACE_SPLITTED_ROOMS               => ['product' => Product::XEF,     'name' => 'Multiples Salas y/o Terrazas'],
            static::RETAIL_PROPERTY_SPACE_STANDARD                  => ['product' => Product::RETAIL,  'name' => 'Estándar'],
            static::RETAIL_PROPERTY_SPACE_DIFFERENT_ROOMS           => ['product' => Product::RETAIL,  'name' => 'Diferentes áreas / plantas'],
            static::RETAIL_PROPERTY_SPACE_DIFFERENT_SPLITTED_ROOMS  => ['product' => Product::RETAIL,  'name' => 'Locales separados'],
        ]);
    }

    public function needProfiles()
    {
        return ! in_array($this->id, [static::XEF_PROPERTY_SPACE_NO, static::RETAIL_PROPERTY_SPACE_STANDARD]);
    }
}
