<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
  protected $fillable=['cost','type_id','region_id','reference','room','bathroom','map','user_id','area','type'];
  public function feature()
  {
    return $this->belongsToMany('App\Feature','property_features');
  }
  use SoftDeletes;
  public function header($language = null)
  {
    if ($language == null)
    {
        $language = App::getLocale();
    }
    return $this->hasMany('App\PropertyHeader')->where('lang', '=', $language);
  }
  use SoftDeletes;
  public function label($language = null)
  {
    if ($language == null)
    {
        $language = App::getLocale();
    }
    return $this->hasMany('App\PropertyLabel')->where('lang', '=', $language);
  }
  use SoftDeletes;
  public function description($language = null)
  {
    if ($language == null)
    {
        $language = App::getLocale();
    }
    return $this->hasMany('App\PropertyDescription')->where('lang', '=', $language);
  }
  public function region()
  {
    return $this->belongsTo('App\Region');
  }
  public function typeproperity()
  {
    return $this->belongsTo('App\Type','type_id','id');
  }
  public function images()
  {
    return $this->hasMany('App\PropertyImage','property_id','id');
  }
}
