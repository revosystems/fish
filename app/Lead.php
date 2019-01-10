<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Taggable;

    const STATUS_NEW           = 1;
    const STATUS_FIRST_CONTACT = 2;
    const STATUS_VISITED       = 3;
    const STATUS_COMPLETED     = 4;
    const STATUS_FAILED        = 5;
}
