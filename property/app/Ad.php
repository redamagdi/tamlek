<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    function page()
    {
      return $this->belongsTo('App\Page');
    }
}
