<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ForeignService;
use App\ForeignRequestService;
use Validator;

class ForeignServiceController extends Controller
{
    public function insertforeignservice(Request $request)
    {
     
          $validator=Validator::make($request->all(),[
              
            'travel_id'=>'required|exists:bd_travellers,id',
            'country_code_from'=>'required|string',
            'country_code_from_latitude'=>'required|string',
            'country_code_from_longitude'=>'required|string',
            'country_code_to'=>'required|string',
            'country_code_to_latitude'=>'required|string',
            'country_code_to_longitude'=>'required|string',
            'travel_start_point'=>'required|string',
            'travel_start_point_latitude'=>'required|string',
            'travel_start_point_longitude'=>'required|string',
            'travel_end_point'=>'required|string',
            'travel_end_point_latitude'=>'required|string',
            'travel_end_point_longitude'=>'required|string',
            'starting_date'=>'required|date',
            'ending_date'=>'required|date',
            'starting_time'=>'required',
            'ending_time'=>'required',
            'traveling_type'=>'required|string',  
          ]);
          if($validator->fails()){
              return response()->json([$validator->errors()],400);
          }

          $foreignserviceadded = new ForeignService;
          $foreignserviceadded->travel_id=$request->travel_id;
          $foreignserviceadded->country_code_from=$request->country_code_from;
          $foreignserviceadded->country_code_from_latitude=$request->country_code_from_latitude;
          $foreignserviceadded->country_code_from_longitude=$request->country_code_from_longitude;
          $foreignserviceadded->country_code_from_longitude=$request->country_code_from_longitude;
          $foreignserviceadded->country_code_to=$request->country_code_to;
          $foreignserviceadded->country_code_to_latitude=$request->country_code_to_latitude;
          $foreignserviceadded->country_code_to_longitude=$request->country_code_to_longitude;
          $foreignserviceadded->travel_start_point=$request->travel_start_point;
          $foreignserviceadded->travel_start_point_latitude=$request->travel_start_point_latitude;
          $foreignserviceadded->travel_start_point_longitude=$request->travel_start_point_longitude;
          $foreignserviceadded->travel_end_point =$request->travel_end_point;
          $foreignserviceadded->travel_end_point_latitude =$request->travel_end_point_latitude;
          $foreignserviceadded->travel_end_point_longitude =$request->travel_end_point_longitude;
          $foreignserviceadded->starting_date =$request->starting_date;
          $foreignserviceadded->ending_date =$request->ending_date;
          $foreignserviceadded->starting_time =$request->starting_time;
          $foreignserviceadded->ending_time =$request->ending_time;
          $foreignserviceadded->traveling_type =$request->traveling_type;

          if($foreignserviceadded->save()){
              return response()->json(['Success'=>'true','message'=>'Foreign Services Added Sucessfully Added'],200);
          }else{
              return response()->json(['Success'=>'false','message'=>'something Went wrong'],400);
          }
        
    }

    public function insertforeignrequestservices(Request $request)
    {
        $validator= Validator::make($request->all(),[
           
            'user_id'=>'required|exists:bd_users,id',
            'weight'=>'required|integer',
            'amount'=>'required|integer',
            'product_type'=>'required|string',

        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }

        $foreignrequestserviceadded = new ForeignRequestService;
        $foreignrequestserviceadded->user_id=$request->user_id;
        $foreignrequestserviceadded->weight=$request->weight;
        $foreignrequestserviceadded->amount=$request->amount;
        $foreignrequestserviceadded->product_type=$request->product_type;
         if($foreignrequestserviceadded->save()){
             return response()->json(['Success'=>'true','message'=>'Foreign Request Service Sucessfully Added'],200);
         }else{
             return response()->json(['Success'=>'false','message'=>'Foreign Request Service UnSucessfully Added'],400);
         }

    }
}
