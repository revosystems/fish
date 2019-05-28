<?php


namespace App\Models;


use Carbon\Carbon;

trait StatusTrait
{
    public static function availableStatus()
    {
        return [
            Status::NEW           => 'new',
            Status::FIRST_CONTACT => 'first-contact',
            Status::VISITED       => 'visited',
            Status::COMPLETED     => 'completed',
            Status::FAILED        => 'failed',
        ];
    }

    public static function getStatusText($status)
    {
        return static::availableStatus()[$status];
    }

    public function statusUpdates()
    {
        return $this->hasMany(LeadStatusUpdate::class)->latest();
    }

    public function statusName()
    {
        return static::getStatusText($this->status);
    }

    public function updateStatus($user, $body, $status)
    {
        if (! $this->user) {
            $this->update(['status' => $status, 'updated_at' => Carbon::now(), 'user_id' => $user->id]);
        } else {
            $this->update(['status' => $status, 'updated_at' => Carbon::now()]);
        }
        return $this->statusUpdates()->create(['user_id' => $user->id, 'new_status' => $status, 'body' => $body]);
    }
}