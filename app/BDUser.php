<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class BDUser extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table='bd_users';
   
  
   
   public function user()
   {  
      return $this->hasMany('App\BDUser','country_code','country_code'); 
   }
   
    protected $fillable = [
        'name', 'email','passwprd','present_address','permanent_address'
    ];


    protected $hidden =[
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

}
