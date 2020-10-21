<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INDTraveller extends Model
{
    protected $table="ind_travellers";
 
    public function user_balance(){
        return $this->hasOne('App\INDUser','id','user_id'); 
    }
    
    public function user_info()
    {
       return $this->hasMany('App\INDUser','id','user_id'); 
    }
}
