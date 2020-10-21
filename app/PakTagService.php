<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakTagService extends Model
{
    protected $table='pak_tag_services';
    public function service_info(){
        return $this->hasOne('App\PakRequestService','id','pak_services_request_id'); 
    }
}
