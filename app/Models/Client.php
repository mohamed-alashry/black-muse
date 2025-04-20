<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'country',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
