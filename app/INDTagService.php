<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INDTagService extends Model
{
    protected $table="ind_tag_services";

    public function service_info(){
        return $this->hasOne('App\INDRequestService','id','ind_services_request_id'); 
    }
}
