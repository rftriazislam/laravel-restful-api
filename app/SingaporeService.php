<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingaporeService extends Model
{
    protected $table="singapore_services";

    public function traveller()
    {
       return $this->hasMany('App\SingaporeTraveller','id','travel_id'); 
    }
 
    public function User()
    {  
       return $this->hasMany('App\SingaporeUser','id','user_id'); 
    }
    public function rating(){
      return $this->hasMany('App\SingaporeRating','user_id','user_id'); 
    }

    public function Sucessfull_delivery()
    {
       return $this->hasMany('App\SingaporeTraveller','user_id','user_id')->where('sucessfull_delivery_count',1); 
    }
    
    public function user_info()
    {
       return $this->hasMany('App\SingaporeUser','id','user_id'); 
    }
}
