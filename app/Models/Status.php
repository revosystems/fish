<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const NEW           = 1;
    const FIRST_CONTACT = 2;
    const VISITED       = 3;
    const COMPLETED     = 4;
    const FAILED        = 5;
}