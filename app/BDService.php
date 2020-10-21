<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BDService extends Model
{
   protected $table="bd_services";
  
   public function traveller()
   {
      return $this->hasMany('App\BDTraveller','id','travel_id'); 
   }

   public function user()
   {  
      return $this->hasMany('App\BDUser','id','user_id'); 
   }
 public function rating(){
   return $this->hasMany('App\BdRating','user_id','user_id'); 
 }



}


