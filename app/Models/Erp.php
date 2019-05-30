<?php

namespace App\Models;

class Erp extends FishDataBase
{
    const SAGE_X3           = 1;
    const SAGE_200CLOUD     = 2;
    const SAGE_BUSINESS_ONE = 3;
    const A3                = 4;
    const SAP               = 5;
    const CORUS             = 6;
    const EXTRASOFT         = 7;
    const CONTASOL          = 8;
    const NETSUITE          = 9;
    const DATISA            = 10;

    public static function all()
    {
        return collect([
            static::A3                  => ['name' => 'A3'],
            static::CONTASOL            => ['name' => 'CONTASOL'],
            static::CORUS               => ['name' => 'Corus'],
            static::DATISA              => ['name' => 'Datisa'],
            static::EXTRASOFT           => ['name' => 'EXTRASOFT'],
            static::NETSUITE            => ['name' => 'NetSuite'],
            static::SAGE_200CLOUD       => ['name' => 'Sage 200cloud'],
            static::SAGE_BUSINESS_ONE   => ['name' => 'Sage Business One'],
            static::SAGE_X3             => ['name' => 'Sage X3'],
            static::SAP                 => ['name' => 'SAP'],
        ]);
    }
}
