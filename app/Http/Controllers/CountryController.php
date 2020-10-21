<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use Validator;

class CountryController extends Controller
{
    

    public function createCountry(Request $request)
    {
        $validator =Validator::make($request->all(),[
              'country_code'=>'required|string',
              'name'=>'required|string',
              'currency'=>'required|string',
        ]);
        if($validator->fails()){
            return response()->json([$validator->errors()],400);
        }

        $countryadd= new Country;
        $countryadd->country_code=$request->country_code;
        $countryadd->name=$request->name;
        $countryadd->currency=$request->currency;
        if($countryadd->save()){
            return response()->json(['success'=>true,'message'=>'Country information Sucessfully Added'],200);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Something Went Wrong'],400);
        }

    }



}
