<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDTraveller;
use App\INDTraveller;
use App\PakTraveller;
use App\SingaporeTraveller;

class GetAllTravelleController extends Controller
{
 public function GetAlltraveller($country_code){
    if($country_code==+880){
        $BangladeshTraveller=BDTraveller::where('country_code',$country_code)
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($BangladeshTraveller) > 0){
            return response()->json(['message'=>'true','Traveller Information'=>$BangladeshTraveller],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }
    }elseif($country_code==+91){
        $IndiaTraveller=INDTraveller::where('country_code',$country_code)
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($IndiaTraveller) > 0){
            return response()->json(['message'=>'true','India Traveller Information'=>$IndiaTraveller],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }
    }elseif($country_code==+92){
        $PakistanTraveller=PakTraveller::where('country_code',$country_code)
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($PakistanTraveller) > 0){
            return response()->json(['message'=>'true','Pakistan Traveller Information'=>$PakistanTraveller],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }
  }elseif($country_code==+65){
    $SingaporeTraveller=SingaporeTraveller::where('country_code',$country_code)
    ->OrderBy('id','ASC')->take(20)->get();
      if(count($SingaporeTraveller) > 0){
        return response()->json(['message'=>'true','Singapore Traveller Information'=>$SingaporeTraveller],200);
      }else{
        return response()->json(['message'=>'false','No Data Found!'],400); 
      }
  }else{
    return response()->json(['message'=>'false','Invalied country code'],400);  
  }
   }
}
