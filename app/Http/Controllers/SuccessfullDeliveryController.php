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
use App\SingaporeService;

class SuccessfullDeliveryController extends Controller
{
    public function getSucessfullDelivery($country_code)

    { 
        if($country_code==+880){
            
                $bangladeshSucessfulldelivery=BDTraveller::where('country_code',$country_code)->where('sucessfull_delivery_count',1)->with('user_info')->
                OrderBy('id','DESC')->take(20)->get();
                  if(count($bangladeshSucessfulldelivery) > 0){
                    return response()->json(['message'=>'true','Traveller'=>$bangladeshSucessfulldelivery],200); 
                  }else{
                    return response()->json(['message'=>'false','Traveller'=>'Did not Sucessful delivery'],200);  
                  }
                
           
        }else if($country_code==+91){   

            $indiaSucessfulldelivery=INDTraveller::where('country_code',$country_code)->where('sucessfull_delivery_count',1)->with('user_info')->
            OrderBy('id','DESC')->take(20)->get();
              if(count($indiaSucessfulldelivery) > 0){
                return response()->json(['message'=>'true','Traveller'=>$indiaSucessfulldelivery],200); 
              }else{
                return response()->json(['message'=>'false','Traveller'=>'Did not Sucessful delivery'],200);  
              }

        }else if($country_code==+92){

            $pakSucessfulldelivery=PakTraveller::where('country_code',$country_code)->where('sucessfull_delivery_count',1)->with('user_info')->
            OrderBy('id','DESC')->take(20)->get();
              if(count($pakSucessfulldelivery) > 0){
                return response()->json(['message'=>'true','Traveller'=>$pakSucessfulldelivery],200); 
              }else{
                return response()->json(['message'=>'false','Traveller'=>'Did not Sucessful delivery'],200);  
              }

        }else if($country_code==+65){
            $singapureSucessfulldelivery=SingaporeTraveller::where('country_code',$country_code)->where('sucessfull_delivery_count',1)->with('user_info')->
            OrderBy('id','DESC')->take(20)->get();
            
              if(count($singapureSucessfulldelivery) > 0){
                return response()->json(['message'=>'true','Traveller'=>$singapureSucessfulldelivery],200); 
              }else{
                return response()->json(['message'=>'false','Traveller'=>'Did not Sucessful delivery'],200);  
              } 
           
        }else{
            return response()->json(['message'=>'false','message'=>'Country Code did not match'],400);
        }


    }
}
