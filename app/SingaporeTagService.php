<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingaporeTagService extends Model
{
    protected $table='singapore_tag_services';

public function service_info(){
    return $this->hasOne('App\SingaporeRequestService','id','singapore_services_request_id'); 
}
}
