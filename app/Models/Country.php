<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $casts = [
        'name' => 'array',
   ];

  public function getNameAttribute($value)
  {
    $name = json_decode($value, true);
    return $name[app()->getLocale()] ?? $name['en'];
  }

}
