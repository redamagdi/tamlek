<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ticket extends Model
{
    protected $fillable=['client_id','route_id','active','cost'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function client()
    {
      return $this->belongsTo('App\Client');
    }
    public function route()
    {
      return $this->belongsTo('App\Route');
    }
    public function maleClient()
    {
      return $this->client()->where('gender','male');
    }

}
