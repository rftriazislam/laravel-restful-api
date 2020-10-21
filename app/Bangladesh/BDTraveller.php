<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BDTraveller extends Model
{
    protected $table='bd_travellers';

public function user_balance(){
    return $this->hasOne('App\BDUser','id','user_id'); 
}


public function user_info()
{
   return $this->hasMany('App\BDUser','id','user_id'); 
}

}
