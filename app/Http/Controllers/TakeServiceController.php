<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\BDRequestService;
use App\INDRequestService;
use App\PakRequestService;
use App\SingaporeRequestService;
use App\BDUser;

class TakeServiceController extends Controller
{
    public function Personalservicetake($user_id,$country_code)
    {
       
        if($country_code ==+880){

            $Servicetake=BDRequestService::where('user_id',$user_id)->where('country_code',$country_code)->get();
            if(count($Servicetake) > 0){
                return response()->json(['message'=>'true','Personal Service Take'=>$Servicetake],200);
            }else{
                return response()->json(['message'=>'true','message'=>'Personal Service did not Take'],200);
            }
           

        }else if($country_code ==+91){

            $Servicetake=INDRequestService::where('user_id',$user_id)->where('country_code',$country_code)->get();
            if(count($Servicetake) > 0){
                return response()->json(['message'=>'true','Personal Service Take'=>$Servicetake],200);
            }else{
                return response()->json(['message'=>'true','message'=>'Personal Service did not Take'],200);
            }

        }else if($country_code==+92){

            $Servicetake=PakRequestService::where('user_id',$user_id)->where('country_code',$country_code)->get();
            if(count($Servicetake) > 0){
                return response()->json(['message'=>'true','Personal Service Take'=>$Servicetake],200);
            }else{
                return response()->json(['message'=>'true','message'=>'Personal Service did not Take'],200);
            }

        }else if($country_code ==+65){
            
            $Servicetake=SingaporeRequestService::where('user_id',$user_id)->where('country_code',$country_code)->get();
            if(count($Servicetake) > 0){
                return response()->json(['message'=>'true','Personal Service Take'=>$Servicetake],200);
            }else{
                return response()->json(['message'=>'true','message'=>'Personal Service did not Take'],200);
            }

        }else {
            return response()->json(['success'=>'false','message'=>'Country code did not match'],400);
        }
        

    }
}
