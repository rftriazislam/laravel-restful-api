<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ]; 
}
