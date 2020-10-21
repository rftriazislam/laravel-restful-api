<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDUser;
use App\INDUser;
use App\PakUser;
use App\SingaporeUser;
use App\BDTraveller;
use App\INDTraveller;
use App\PakTraveller;
use App\SingaporeTraveller;
class TotalUserDeliveryTravellerController extends Controller
{
  public function landingpagetotaluserdeliverytraveller()
  {

      $totol_bangladesh_User=BDUser::count('id');
      $total_india_User=INDUser::count('id');
      $total_pakistan_User=PakUser::count('id');
      $total_signgapur_User=SingaporeUser::count('id');
      $TotalUser=$totol_bangladesh_User+$total_india_User+$total_pakistan_User+$total_signgapur_User;
     
       $total_bangladesh_Traveller=BDTraveller::count('id');
       $total_india_Traveller=INDTraveller::count('id');
       $total_pakistan_Traveller=PakTraveller::count('id');
       $total_singapur_Traveller=SingaporeTraveller::count('id');
       $TotalTraveller=$total_bangladesh_Traveller+$total_india_Traveller+$total_pakistan_Traveller+$total_singapur_Traveller;

       $Total_Bangladesh_Sucessfully_delivery=BDTraveller::sum('sucessfull_delivery_count',1);
       $total_India_Sucessfully_delivery=INDTraveller::sum('sucessfull_delivery_count',1);
       $total_pakistan_Sucessfully_delivery=PakTraveller::sum('sucessfull_delivery_count',1);
       $total_signgapure_Sucessfully_delivery=SingaporeTraveller::sum('sucessfull_delivery_count',1);
       $totalSuccessfullydelivery=$Total_Bangladesh_Sucessfully_delivery+$total_India_Sucessfully_delivery+$total_pakistan_Sucessfully_delivery+$total_signgapure_Sucessfully_delivery;
     
  return response()->json(['success'=>'true','Total_User'=>$TotalUser,'Total_Traveller'=>$TotalTraveller,'Total_Successfully_Delivery'=>$totalSuccessfullydelivery],200);
      



  }
}
