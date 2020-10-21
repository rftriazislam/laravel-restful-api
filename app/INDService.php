<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INDService extends Model
{
    protected $table ='ind_services';
    
    public function traveller()
    {
       return $this->hasMany('App\INDTraveller','id','travel_id'); 
    }
 
    public function user()
    {  
       return $this->hasMany('App\INDUser','id','user_id'); 
    }
    public function rating(){
      return $this->hasMany('App\IndRating','user_id','user_id'); 
    }
 
}
