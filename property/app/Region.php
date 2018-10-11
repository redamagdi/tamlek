<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  protected $fillable=['name','city_id'];
  function city()
  {
    return $this->belongsTo('App\City');
  }

  function properities()
  {
    return $this->hasMany('App\Property','region_id','id');
  }
}
