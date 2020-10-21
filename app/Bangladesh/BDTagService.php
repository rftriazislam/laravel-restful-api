<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BDTagService extends Model
{
    protected $table='bd_tag_services';
    public function service_info(){
        return $this->hasOne('App\BDRequestService','id','bd_services_request_id'); 
    }
}
