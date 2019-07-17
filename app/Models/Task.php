<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $dates = ['date', 'completed_at'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function isCompleted(){
        return $this->completed_at != null;
    }

    public function isDue()
    {
        return now()->diffInSeconds($this->date, false) < 0;
    }

    public function scopeDue($query){
        return $query->whereNull('completed_at')->where('date','<', now());
    }

    public function scopeIncomplete($query){
        return $query->whereNull('completed_at');
    }


    public function complete()
    {
        return $this->update(['completed_at' => now()]);
    }
}
