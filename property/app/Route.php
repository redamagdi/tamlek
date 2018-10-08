<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Route extends Model
{
    protected $fillable=['name','source','destination','driverName','date','startAt','endAt'];
}
