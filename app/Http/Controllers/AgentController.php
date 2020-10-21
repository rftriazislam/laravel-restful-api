<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDAgent;
use Validator;
use Hash;

class AgentController extends Controller
{
    public function insertagent(Request $R)
    {
      $validator=Validator::make($R->all(),[
        
             'country_code'=>'required|exists:countries,country_code|string',
             'name'=>'required|string',
             'email'=>'required|string',
             'password'=>'required|string',
             'present_address'=>'required|string',
             'permanent_address'=>'required|string',
             'agent_location'=>'required|string',

      ]);

      if($validator->fails()){
          return response()->json([$validator->errors()],400);
      }
      $bdagentadd= new BDAgent;
      $bdagentadd->country_code=$R->country_code;
      $bdagentadd->name=$R->name;
      $bdagentadd->email=$R->email;
      $bdagentadd->password=Hash::make($R->password);
      $bdagentadd->present_address=$R->present_address;
      $bdagentadd->permanent_address=$R->permanent_address;
      $bdagentadd->agent_location=$R->agent_location;

      if($bdagentadd->save()){
          return response()->json(['success'=>'true','message'=>'Bangladesh agent sucessfully added'],200);
      }else{
          return response()->json(['success'=>'false','message'=>'Bangladesh agent Unsucessfully added'],400);
      }

      
    }
}
