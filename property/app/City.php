<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable=['name','country_id'];
  function country()
  {
    return $this->belongsTo('App\Country');
  }

  function regions()
  {
    return $this->hasMany('App\Region','city_id','id');
  }
}
