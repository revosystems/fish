<?php

namespace App\Models;

class SoftType extends FishDataBase
{
    const ALMACEN_Y_COMPRAS         = 1;
    const BI_GESTION_DE_PERSONAL    = 2;
    const RESERVAS                  = 3;
    const DELIVERY                  = 4;
    const RECETAS                   = 5;
    const ECOMMERCE                 = 6;

    public static function all()
    {
        return collect([
            static::ALMACEN_Y_COMPRAS       => ['proposal' => Proposal::SOFT_ALMACOMPRAS, 'name' => 'Almacén y compras'],
            static::BI_GESTION_DE_PERSONAL  => ['proposal' => Proposal::SOFT_BIPERSONAL, 'name' => 'BI / Gestión de personal'],
            static::RESERVAS                => ['proposal' => Proposal::SOFT_RESERVAS, 'name' => 'Reservas'],
            static::DELIVERY                => ['proposal' => Proposal::SOFT_DELIVERY, 'name' => 'Delivery'],
            static::RECETAS                 => ['proposal' => Proposal::SOFT_RECETAS, 'name' => 'Recetas'],
            static::ECOMMERCE               => ['proposal' => Proposal::SOFT_ECOMMERCE, 'name' => 'eCommerce'],
        ]);
    }

    public function proposal()
    {
        return Proposal::find($this->reference['proposal']);
    }
}
