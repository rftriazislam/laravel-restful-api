<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDRequestService;
use App\INDRequestService;
use App\PakRequestService;
use App\SingaporeRequestService;

use Validator;
use DB;
class ServiceRequestController extends Controller
{

public function ServiceRequestCalculation(Request $request){
$country_code=$request->country_code;
$delivary_weight=$request->weight;
$product_type=$request->product_type;

    $price_calculate=DB::table('price_calculations')->where('country_code',$country_code)->where('min_weight','<=',$delivary_weight)->where('max_weight','>=',$delivary_weight)->get();

exit();
$price_calculate=DB::table('price_calculations')->where('country_code',$country_code)->get();



    foreach($price_calculate as $weight){ 
        if($weight->min_weight<=$delivary_weight&&$weight->max_weight>=$delivary_weight){
        
                $delivary_cost=$delivary_weight*$weight->price;
                return response()->json(['Success'=>'true','Weight'=>$delivary_weight,'price'=>$delivary_cost,'product type'=>$product_type],200);
        }
     
    }
     
if($delivary_weight>=0&&$delivary_weight<=2){
    $delivary_cost=$price_calculate->price;
    return response()->json(['Success'=>'true','Weight'=>$delivary_weight,'price'=>$delivary_cost,'product type'=>$product_type],200);
}else{
  
        $price=$price_calculate->price;
        $delivary_cost=$delivary_weight*$price;
        return response()->json(['Success'=>'true','Weight'=>$delivary_weight,'price'=>$delivary_cost,'product type'=>$product_type],200);
}
} 





    public function insertservicerequest(Request $request)
    {
        $country=$request->country_code;

        if($country==+880){
            $validator=Validator::make($request->all(),[
                    
                 'user_id'=>'required|integer|exists:bd_users,id',
                 'country_code'=>'required|exists:countries,country_code',
                 'weight'=>'required|integer',
                 'product_type'=>'required|string', 
                 'delivery_cost'=>'required|integer',
                 'traveller_id'=>'required|exists:bd_travellers,id',
                 'bd_services_id'=>'required|exists:bd_services,id',


            ]);
            if($validator->fails()){
                return response()->json([$validator->errors()],400);
            }
    
            $bdservicerequestadd = new BDRequestService;
            $bdservicerequestadd->user_id=$request->user_id;
            $bdservicerequestadd->country_code=$request->country_code;
            $bdservicerequestadd->weight=$request->weight;
            $bdservicerequestadd->delivery_cost=$request->delivery_cost;
            $bdservicerequestadd->product_type=$request->product_type;
            $bdservicerequestadd->traveller_id = $request->traveller_id;
            $bdservicerequestadd->bd_services_id = $request->bd_services_id;

            if($bdservicerequestadd->save()){
                return response()->json(['Success'=>'true','message'=>' Request services sucessfully added'],200);
            }else{
                return response()->json(['success'=>'false','message'=>'something went Wrong!'],400);
            }
        }else if($country==+91){
            $validator=Validator::make($request->all(),[
                    
                'user_id'=>'required|integer|exists:ind_users,id',
                'country_code'=>'required|exists:countries,country_code',
                'weight'=>'required|integer',
                'delivery_cost'=>'required|integer',
                'traveller_id'=>'required|exists:ind_travellers,id',
                'ind_services_id'=>'required|exists:ind_services,id',
                 'product_type'=>'required|string', 
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors()],400);
            }
    
            $indservicerequestadd = new INDRequestService;
            $indservicerequestadd->user_id=$request->user_id;
            $indservicerequestadd->country_code=$request->country_code;
            $indservicerequestadd->weight=$request->weight;
            $indservicerequestadd->product_type=$request->product_type;
            $indservicerequestadd->delivery_cost=$request->delivery_cost;
            $indservicerequestadd->traveller_id = $request->traveller_id;
            $indservicerequestadd->ind_services_id = $request->ind_services_id;
            if($indservicerequestadd->save()){
                return response()->json(['Success'=>'true','message'=>'Request services sucessfully added'],200);
            }else {
                return response()->json(['success'=>'false','message'=>'something went Wrong!'],400);
            }

            
        }
        else if($country==+92){
            $validator=Validator::make($request->all(),[
                    
                'user_id'=>'required|integer|exists:pak_users,id',
                'country_code'=>'required|exists:countries,country_code',
                'weight'=>'required|integer',
                'delivery_cost'=>'required|integer',
                 'traveller_id'=>'required|exists:pak_travellers,id',
                 'pak_services_id'=>'required|exists:pak_services,id',
                 'product_type'=>'required|string', 
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors()],400);
            }
    
            $pakservicerequestadd = new PakRequestService;
            $pakservicerequestadd->user_id=$request->user_id;
            $pakservicerequestadd->country_code=$request->country_code;
            $pakservicerequestadd->weight=$request->weight;
            $pakservicerequestadd->delivery_cost=$request->delivery_cost;
            $pakservicerequestadd->traveller_id = $request->traveller_id;
            $pakservicerequestadd->pak_services_id = $request->pak_services_id;
            $pakservicerequestadd->product_type=$request->product_type;
            if($pakservicerequestadd->save()){
                return response()->json(['Success'=>'true','message'=>' Request services sucessfully added'],200);
            }else{
                return response()->json(['success'=>'false','message'=>'something went Wrong!'],400);
            }
            
        } else if($country==+65){
            $validator=Validator::make($request->all(),[
                    
                'user_id'=>'required|integer|exists:singapore_users,id',
                'country_code'=>'required|exists:countries,country_code',
                'weight'=>'required|integer',
                'delivery_cost'=>'required|integer',
                 'traveller_id'=>'required|exists:singapore_travellers,id',
                 'singapore_services_id'=>'required|exists:singapore_services,id',
                 'product_type'=>'required|string', 
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors()],400);
            }
    
            $singaporeservicerequestadd = new SingaporeRequestService;
            $singaporeservicerequestadd->user_id=$request->user_id;
            $singaporeservicerequestadd->country_code=$request->country_code;
            $singaporeservicerequestadd->weight=$request->weight;
            $singaporeservicerequestadd->delivery_cost=$request->delivery_cost;
            $singaporeservicerequestadd->traveller_id = $request->traveller_id;
            $singaporeservicerequestadd->singapore_services_id = $request->singapore_services_id;
            $singaporeservicerequestadd->product_type=$request->product_type;
            if($singaporeservicerequestadd->save()){
                return response()->json(['Success'=>'true','message'=>' Request services sucessfully added'],200);
            }else{
                return response()->json(['success'=>'false','message'=>'something went Wrong!'],400);
            }
            
        }else{
            return response()->json(['success'=>'false','message'=>'Country Code did not match'],400);

        }


    }
}
