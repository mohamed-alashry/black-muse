<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
   
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
