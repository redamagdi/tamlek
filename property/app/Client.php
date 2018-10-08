<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name','mobile','password','email','gender','block','active'];
    public function bank()
    {
      return $this->hasOne('App\Bank');
    }
    public function ticket()
    {
      return $this->hasMany('App\Ticket');
    }
    public function ticketCount()
    {
      return $this->hasMany('App\Ticket')->count();
    }
}
