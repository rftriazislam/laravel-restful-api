<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingaporeTraveller extends Model
{
    protected $table='singapore_travellers';

    public function user_balance(){
        return $this->hasOne('App\SingaporeUser','id','user_id'); 
    }
    
    public function user_info()
    {
       return $this->hasMany('App\SingaporeUser','id','user_id'); 
    }
}
