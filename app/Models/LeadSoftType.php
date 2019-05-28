<?php

namespace App\Models;

class LeadSoftType
{
    const ALMACEN_Y_COMPRAS         = 1;
    const BI_GESTION_DE_PERSONAL    = 2;
    const RESERVAS                  = 3;
    const DELIVERY                  = 4;
    const RECETAS                   = 5;
    const ECOMMERCE                 = 6;

    public static function all()
    {
        return [
            static::ALMACEN_Y_COMPRAS       => ['related_proposal_id' => '42','name' => 'Almacén y compras'],
            static::BI_GESTION_DE_PERSONAL  => ['related_proposal_id' => '43','name' => 'BI / Gestión de personal'],
            static::RESERVAS                => ['related_proposal_id' => '47','name' => 'Reservas'],
            static::DELIVERY                => ['related_proposal_id' => '44','name' => 'Delivery'],
            static::RECETAS                 => ['related_proposal_id' => '46','name' => 'Recetas'],
            static::ECOMMERCE               => ['related_proposal_id' => '45','name' => 'eCommerce'],
        ];
    }

    public static function find($id)
    {
        return static::all()[$id];
    }
}
