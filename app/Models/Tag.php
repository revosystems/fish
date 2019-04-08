<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function leads()
    {
        return $this->morphedByMany(Lead::class, 'taggable');
    }
}
