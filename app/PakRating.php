<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakRating extends Model
{
    protected $table="pak_ratings";
    public function rating_give_user_info(){
        return $this->hasMany('App\PakUser','id','user_id'); 
    }
}
