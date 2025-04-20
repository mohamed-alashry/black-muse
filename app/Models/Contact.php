<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
