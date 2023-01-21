<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable =[
        'province'
];
function city(){
  return $this->hasMany('App\Models\City');
}
public function cityWithAddress(){
  return $this->city()->with('city_address');
}
public function seller(){
    return $this->belongsToMany('App\Models\seller');

  }
}
