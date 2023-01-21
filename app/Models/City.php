<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable = ['perirty'];
  protected $table = "cities";
  public function seller()
  {
    return $this->hasMany('App\Models\Property');
  }
  function city_address()
  {
    return $this->hasMany('App\Models\Address', 'city_id');
  }
}
