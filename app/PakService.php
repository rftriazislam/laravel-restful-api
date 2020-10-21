<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakService extends Model
{
    protected $table="pak_services";

    public function traveller()
    {
       return $this->hasMany('App\PakTraveller','id','travel_id'); 
    }
 
    public function user()
    {  
       return $this->hasMany('App\PakUser','id','user_id'); 
    }
    public function rating(){
      return $this->hasMany('App\PakRating','user_id','user_id'); 
    }


    public function Sucessfull_delivery()
    {
       return $this->hasMany('App\PakTraveller','user_id','user_id')->where('sucessfull_delivery_count',1); 
    }
    
    public function user_info()
    {
       return $this->hasMany('App\PakUser','id','user_id'); 
    }
}
