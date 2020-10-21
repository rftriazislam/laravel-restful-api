<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingaporeRating extends Model
{
    protected $table="singapore_ratings";
    public function rating_give_user_info(){
        return $this->hasMany('App\SingaporeUser','id','user_id'); 
    }
}
