<?php

namespace App\Models;

class LeadErp
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
        return [
            static::A3                  => 'A3',
            static::CONTASOL            => 'CONTASOL',
            static::CORUS               => 'Corus',
            static::DATISA              => 'Datisa',
            static::EXTRASOFT           => 'EXTRASOFT',
            static::NETSUITE            => 'NetSuite',
            static::SAGE_200CLOUD       => 'Sage 200cloud',
            static::SAGE_BUSINESS_ONE   => 'Sage Business One',
            static::SAGE_X3             => 'Sage X3',
            static::SAP                 => 'SAP',
        ];
    }
}
