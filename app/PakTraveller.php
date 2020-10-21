<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakTraveller extends Model
{
    protected $table='pak_travellers';
   
   
    public function user_balance(){
        return $this->hasOne('App\PakUser','id','user_id'); 
    }
   
    public function user_info()
    {
       return $this->hasMany('App\PakUser','id','user_id'); 
    }
    
    
}
