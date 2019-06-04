<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\RegisterNotification;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname1', 'surname2', 'enterprise', 'territory', 'department', 'position', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new RegisterNotification);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getOrganizationName()
    {
        return strtolower(auth()->user()->organization->name ?? 'telefonica');
    }

    public function platform()
    {
        return auth()->user()->organization->platform ?? 'telefonica';
    }
}