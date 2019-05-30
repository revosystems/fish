<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadStatusUpdate extends Model
{
    protected $guarded = [];
    public function statusName()
    {
        return Status::text($this->new_status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
