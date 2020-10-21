<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BdRating;
use App\IndRating;
use App\PakRating;
use App\SingaporeRating;


class GetAllRatingController extends Controller
{
    public function GetAllRating($country_code){
   
            if($country_code==+880){
                $BangladeshRating=BdRating::where('country_code',$country_code)
                ->OrderBy('id','ASC')->get();
                  if(count($BangladeshRating) > 0){
                    return response()->json(['message'=>'true','Bangladesh Rating Information'=>$BangladeshRating],200);
                  }else{
                    return response()->json(['message'=>'false','No Data Found!'],400); 
                  }
            }elseif($country_code==+91){
                $IndiaRating=IndRating::where('country_code',$country_code)
                ->OrderBy('id','ASC')->get();
                  if(count($IndiaRating) > 0){
                    return response()->json(['message'=>'true','India Rating Information'=>$IndiaRating],200);
                  }else{
                    return response()->json(['message'=>'false','No Data Found!'],400); 
                  }
            }elseif($country_code==+92){
                $PakistanRating=PakRating::where('country_code',$country_code)
                ->OrderBy('id','ASC')->get();
                  if(count($PakistanRating) > 0){
                    return response()->json(['message'=>'true','Pakistan Rating Information'=>$PakistanRating],200);
                  }else{
                    return response()->json(['message'=>'false','No Data Found!'],400); 
                  }
          }elseif($country_code==+65){
            $SingaporeRating=SingaporeRating::where('country_code',$country_code)
            ->OrderBy('id','ASC')->get();
              if(count($SingaporeRating) > 0){
                return response()->json(['message'=>'true','Singapore Rating Information'=>$SingaporeRating],200);
              }else{
                return response()->json(['message'=>'false','No Data Found!'],400); 
              }
          }else{
            return response()->json(['message'=>'false','Invalied country code'],400);  
          }

    }
    public function GetAllRatingUser($country_code,$user_id){


        if($country_code==+880){
            $BangladeshRatingUser=BdRating::where('country_code',$country_code)->where('user_id',$user_id)->with('rating_give_user_info')
            ->OrderBy('id','DESC')->get();

              if(count($BangladeshRatingUser) > 0){
                return response()->json(['message'=>'true','Bangladesh Rating User Information'=>$BangladeshRatingUser],200);
              }else{
                return response()->json(['message'=>'false','No Data Found!'],400); 
              }
        }elseif($country_code==+91){
            $IndiaRatingUser=IndRating::where('country_code',$country_code)->where('user_id',$user_id)->with('rating_give_user_info')
            ->OrderBy('id','DESC')->get();
              if(count($IndiaRatingUser) > 0){
                return response()->json(['message'=>'true','India Rating User Information'=>$IndiaRatingUser],200);
              }else{
                return response()->json(['message'=>'false','No Data Found!'],400); 
              }
        }elseif($country_code==+92){
            $PakistanRatingUser=PakRating::where('country_code',$country_code)->where('user_id',$user_id)->with('rating_give_user_info')
            ->OrderBy('id','DESC')->get();
              if(count($PakistanRatingUser) > 0){
                return response()->json(['message'=>'true','Pakistan Rating User Information'=>$PakistanRatingUser],200);
              }else{
                return response()->json(['message'=>'false','No Data Found!'],400); 
              }
      }elseif($country_code==+65){
        $SingaporeRatingUser=SingaporeRating::where('country_code',$country_code)->where('user_id',$user_id)->with('rating_give_user_info')
        ->OrderBy('id','DESC')->get();
          if(count($SingaporeRatingUser) > 0){
            return response()->json(['message'=>'true','Singapore Rating User Information'=>$SingaporeRatingUser],200);
          }else{
            return response()->json(['message'=>'false','No Data Found!'],400); 
          }
      }else{
        return response()->json(['message'=>'false','Invalied country code'],400);  
      }

    }
  
}
