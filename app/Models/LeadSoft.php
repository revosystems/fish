<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadSoft extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}