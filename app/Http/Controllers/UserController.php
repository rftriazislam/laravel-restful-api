<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDUser;
use App\INDUser;
use App\PakUser;
use App\SingaporeUser;
use DB;


class UserController extends Controller
 {
    public function getUserTopEarn() {

      $BangladeshUserUser=BDUser::OrderBy('total_earn','DESC')->take(10)->get();
      
      $indiaUser=INDUser::OrderBy('total_earn','DESC')->take(10)->get();
      $pakuser=PakUser::OrderBy('total_earn','DESC')->take(10)->get();
      $SingaporeUser=SingaporeUser::OrderBy('total_earn','DESC')->take(10)->get();

      $all=array_merge($BangladeshUserUser->all(), $indiaUser->all(),$pakuser->all(),$SingaporeUser->all());

        $Topearn=collect($all)->sortByDesc('total_earn')->take(20);
       
        if(count($Topearn) > 0){

            return response()->json(['Success'=>'True','Top_Earner'=>$Topearn],200);
        }else{
            return response()->json(['Success'=>'false','Top_Earner'=>'data not found'],400); 
        }
      
      

    }
}
