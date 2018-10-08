<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
  use SoftDeletes;
  public function name($language = null)
  {
    if ($language == null)
    {
        $language = App::getLocale();
    }
    return $this->hasMany('App\FeatureName')->where('lang', '=', $language);
  }

}
