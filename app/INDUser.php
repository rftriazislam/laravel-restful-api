<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class INDUser extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table='ind_users';
    //   protected $guards='india';
    // public function traveller()
    // {  
    //    return $this->hasMany('App\INDTraveller','user_id','id'); 
    // }
    
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
