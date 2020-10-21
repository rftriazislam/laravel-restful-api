<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDTraveller;
use App\INDTraveller;
use App\PakTraveller;
use App\SingaporeTraveller;
use App\BDService;
use App\INDService;
use App\PakService;
use App\BDUser;
use App\BdRating;
use App\SingaporeService;


class GetAllServiceController extends Controller
{
    public function AllCountryServiceController($country_code)
    {
       if($country_code == +880){  

        $BangladeshService=BDService::where('country_code',$country_code)->with('traveller')->with('user')->with('rating')
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($BangladeshService) > 0){
            return response()->json(['message'=>'true','Service Information'=>$BangladeshService],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }
       

       } else if($country_code==+91){

        $IndiaService=INDService::where('country_code',$country_code)->with('traveller')->with('user')->with('rating')
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($IndiaService) > 0){
            return response()->json(['message'=>'true','Service Information'=>$IndiaService],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }

       }else if($country_code == +92){

        $pakistanService=PakService::where('country_code',$country_code)->with('traveller')->with('user')->with('rating')
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($pakistanService) > 0){
            return response()->json(['message'=>'true','Service Information'=>$pakistanService],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }

       }else if($country_code == +65){

        $signpureService=SingaporeService::where('country_code',$country_code)->with('traveller')->with('User')->with('rating')
        ->OrderBy('id','ASC')->take(20)->get();
          if(count($signpureService) > 0){
            return response()->json(['message'=>'true','Service Information'=>$signpureService],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }

       }else{
          return response()->json(['message'=>'Country Code did not match'],400);
       }

    }
    public function personalservice($user_id,$country_code)
    {

      if($country_code == +880){

        $personalservice=BDService::where('country_code',$country_code)->where('user_id',$user_id)->get();
         if(count($personalservice) > 0){
            return response()->json(['success'=>'true','Service personal info'=>$personalservice],200);
         }else{
           return response()->json(['Success'=>'true','message'=>'Personal service Did not create'],200);
         }
       
      }else if($country_code==+91){
         $personalservice=INDService::where('country_code',$country_code)->where('user_id',$user_id)->get();
         if(count($personalservice) > 0){
            return response()->json(['success'=>'true','Service personal info'=>$personalservice],200);
         }else{
           return response()->json(['Success'=>'true','message'=>'Personal service Did not create'],200);
         }

      }else if($country_code ==+92){
        $personalservice=PakService::where('country_code',$country_code)->where('user_id',$user_id)->get();
        if(count($personalservice) > 0){
           return response()->json(['success'=>'true','Service personal info'=>$personalservice],200);
        }else{
          return response()->json(['Success'=>'true','message'=>'Personal service Did not create'],200);
        }

      }else if($country_code ==+65){
        $personalservice=SingaporeService::where('country_code',$country_code)->where('user_id',$user_id)->get();
        if(count($personalservice) > 0){
           return response()->json(['success'=>'true','Service personal info'=>$personalservice],200);
        }else{
          return response()->json(['Success'=>'true','message'=>'Personal service Did not create'],200);
        }
      }else{
        return response()->json(['Success'=>'false','message'=>'country code did not match'],400);

      }
     

    }
}
