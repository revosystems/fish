<?php

namespace App\Models;

class XefSpecificTypology extends FishDataBase
{
    const CARTA     = 1;
    const EVENTS    = 2;
    const MENU      = 3;
    public static function all()
    {
        return collect([
            static::CARTA   => ['name' => __('app.lead.carta')],
            static::EVENTS  => ['name' => __('app.lead.events')],
            static::MENU    => ['name' => __('app.lead.menu')],
        ]);
    }
}