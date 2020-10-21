<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdRating extends Model
{
    protected $table="bd_ratings";
    public function rating_give_user_info(){
        return $this->hasMany('App\BDUser','id','user_id'); 
    }
}
