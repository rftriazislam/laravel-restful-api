<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDTagService;
use App\INDTagService;
use App\PakTagService;
use App\SingaporeTagService;
use App\BDUser;
use App\BDTraveller;
use App\INDTraveller;
use App\INDUser;
use App\PakTraveller;
use App\PakUser;
use App\SingaporeTraveller;
use App\SingaporeUser;


use Validator;

class TagServiceRequestController extends Controller
 {
    public function inserttagservice( Request $request )
 {
        $country = $request->country_code;
        if ( $country == +880 ) {
            $validator = Validator::make( $request->all(), [
                'user_id'=>'required|exists:bd_users,id',
                'traveller_id'=>'required|exists:bd_travellers,id',
                'bd_services_id'=>'required|exists:bd_services,id',
                'bd_services_request_id'=>'required|exists:bd_request_services,id',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $bdtagservice = new BDTagService;
            $bdtagservice->user_id = $request->user_id;
            $bdtagservice->traveller_id = $request->traveller_id;
            $bdtagservice->bd_services_id = $request->bd_services_id;
            $bdtagservice->bd_services_request_id = $request->bd_services_request_id;
            if ( $bdtagservice->save() ) {
                return response()->json( ['Success'=>'true', 'message'=>'Bangladesh tag service Sucessfully Added'], 200 );
            } else {
                return response()->json( ['Success'=>'false', 'message'=>'Bangladesh tag Service UnSucessfully Added'], 400 );
            }

        } else if ( $country == +91 ) {

            $validator = Validator::make( $request->all(), [
                'user_id'=>'required|exists:ind_users,id',
                'traveller_id'=>'required|exists:ind_travellers,id',
                'ind_services_id'=>'required|exists:ind_services,id',
                'ind_services_request_id'=>'required|exists:ind_request_services,id',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $indtagservice = new INDTagService;
            $indtagservice->user_id = $request->user_id;
            $indtagservice->traveller_id = $request->traveller_id;
            $indtagservice->ind_services_id = $request->ind_services_id;
            $indtagservice->ind_services_request_id = $request->ind_services_request_id;
            if ( $indtagservice->save() ) {
                return response()->json( ['Success'=>'true', 'message'=>'India tag service Sucessfully Added'], 200 );
            } else {
                return response()->json( ['Success'=>'false', 'message'=>'india tag Service UnSucessfully Added'], 400 );
            }

        } else if ( $country == +92 ) {
            $validator = Validator::make( $request->all(), [
                'user_id'=>'required|exists:pak_users,id',
                'traveller_id'=>'required|exists:pak_travellers,id',
                'pak_services_id'=>'required|exists:pak_services,id',
                'pak_services_request_id'=>'required|exists:pak_request_services,id',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $paktagservice = new PakTagService;
            $paktagservice->user_id = $request->user_id;
            $paktagservice->traveller_id = $request->traveller_id;
            $paktagservice->pak_services_id = $request->pak_services_id;
            $paktagservice->pak_services_request_id = $request->pak_services_request_id;
            if ( $paktagservice->save() ) {
                return response()->json( ['Success'=>'true', 'message'=>'Pakistan tag service Sucessfully Added'], 200 );
            } else {
                return response()->json( ['Success'=>'false', 'message'=>'Pakistan tag Service UnSucessfully Added'], 400 );
            }

        } else if ( $country == +65 ) {
            $validator = Validator::make( $request->all(), [
                'user_id'=>'required|exists:singapore_users,id',
                'traveller_id'=>'required|exists:singapore_travellers,id',
                'singapore_services_id'=>'required|exists:singapore_services,id',
                'singapore_services_request_id'=>'required|exists:singapore_request_services,id',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $singaporetagservice = new SingaporeTagService;
            $singaporetagservice->user_id = $request->user_id;
            $singaporetagservice->traveller_id = $request->traveller_id;
            $singaporetagservice->singapore_services_id = $request->singapore_services_id;
            $singaporetagservice->singapore_services_request_id = $request->singapore_services_request_id;
            if ( $singaporetagservice->save() ) {
                return response()->json( ['Success'=>'true', 'message'=>'Singapore tag service Sucessfully Added'], 200 );
            } else {
                return response()->json( ['Success'=>'false', 'message'=>'Singapore tag Service UnSucessfully Added'], 400 );
            }

        } else {
            return response()->json( ['Success'=>'false', 'message'=>'Invalied Country code'], 400 );

        }

    }

    public function TravellerAcceptRequest($country_code,$tag_service_id ) {
      
if($country_code==+880){
    $all_ready_accept = BDTagService::where( 'id', $tag_service_id )->first();
    $traveller_id =$all_ready_accept->traveller_id;
   
    if ( $all_ready_accept->active != '1' ) {
    $user = BDTraveller::where( 'id', $traveller_id )->first();
    $traveller_balance = $user->user_balance->balance;
    $tag_service = BDTagService::where( 'id', $tag_service_id )->first();
    $service_balance = $tag_service->service_info->amount;
    $profit = ( $service_balance*20 )/100;
    $traveller_earn = $service_balance-$profit;
        if ( $traveller_balance >= $profit ) {
            $user_info =  BDUser::where( 'id', $user->user_id )->first();
            $user_info->balance = ( $user_info->balance-$profit );
            $user_info->total_earn = ( $user_info->total_earn + $traveller_earn );
            $user_info->save();

          
            $tag_service->active = '1';
            $tag_service->save();
            return response()->json( ['Success'=>'true', 'message'=>'Successfully Service request accept '], 400 );
        } else {
            return response()->json( ['Success'=>'false', 'message'=>'Please Add Money'], 400 );
        }
    } else {
        return response()->json( ['Success'=>'true', 'message'=>'All ready Accept'], 400 );
    }

}elseif($country_code==+91){
    $all_ready_accept = INDTagService::where( 'id', $tag_service_id )->first();
    $traveller_id =$all_ready_accept->traveller_id;
  
    if ( $all_ready_accept->active != '1' ) {
    $user = INDTraveller::where( 'id', $traveller_id )->first();
    $traveller_balance = $user->user_balance->balance;
    $tag_service = INDTagService::where( 'id', $tag_service_id )->first();

    $service_balance = $tag_service->service_info->amount;
   
   
   
    $profit = ( $service_balance*20 )/100;
    $traveller_earn = $service_balance-$profit;
        if ( $traveller_balance >= $profit ) {
            $user_info =  INDUser::where( 'id', $user->user_id )->first();
            $user_info->balance = ( $user_info->balance-$profit );
            $user_info->total_earn = ( $user_info->total_earn + $traveller_earn );
            $user_info->save();

          
            $tag_service->active = '1';
            $tag_service->save();
            return response()->json( ['Success'=>'true', 'message'=>'Successfully India Service request accept '], 400 );
        } else {
            return response()->json( ['Success'=>'false', 'message'=>'Please  Add Money'], 400 );
        }
    } else {
        return response()->json( ['Success'=>'true', 'message'=>'All ready Accept'], 400 );
    }
}elseif($country_code==+92){
    $all_ready_accept = PakTagService::where( 'id', $tag_service_id )->first();
    $traveller_id =$all_ready_accept->traveller_id;
   
    if ( $all_ready_accept->active != '1' ) {
    $user = PakTraveller::where( 'id', $traveller_id )->first();
    $traveller_balance = $user->user_balance->balance;
    $tag_service = PakTagService::where( 'id', $tag_service_id )->first();
    $service_balance = $tag_service->service_info->amount;
    $profit = ( $service_balance*20 )/100;
    $traveller_earn = $service_balance-$profit;
        if ( $traveller_balance >= $profit ) {
            $user_info =  PakUser::where( 'id', $user->user_id )->first();
            $user_info->balance = ( $user_info->balance-$profit );
            $user_info->total_earn = ( $user_info->total_earn + $traveller_earn );
            $user_info->save();

          
            $tag_service->active = '1';
            $tag_service->save();
            return response()->json( ['Success'=>'true', 'message'=>'Successfully Pakistan Service request accept '], 400 );
        } else {
            return response()->json( ['Success'=>'false', 'message'=>'Please Add Money'], 400 );
        }
    } else {
        return response()->json( ['Success'=>'true', 'message'=>'All ready Accept'], 400 );
    }
}elseif($country_code==+65){
    $all_ready_accept = SingaporeTagService::where( 'id', $tag_service_id )->first();
    $traveller_id =$all_ready_accept->traveller_id;
   
    if ( $all_ready_accept->active != '1' ) {
    $user = SingaporeTraveller::where( 'id', $traveller_id )->first();
    $traveller_balance = $user->user_balance->balance;
    $tag_service = SingaporeTagService::where( 'id', $tag_service_id )->first();
    $service_balance = $tag_service->service_info->amount;
    $profit = ( $service_balance*20 )/100;
    $traveller_earn = $service_balance-$profit;
        if ( $traveller_balance >= $profit ) {
            $user_info = SingaporeUser::where( 'id', $user->user_id )->first();
            $user_info->balance = ( $user_info->balance-$profit );
            $user_info->total_earn = ( $user_info->total_earn + $traveller_earn );
            $user_info->save();

          
            $tag_service->active = '1';
            $tag_service->save();
            return response()->json( ['Success'=>'true', 'message'=>'Successfully Singapore Service request accept '], 400 );
        } else {
            return response()->json( ['Success'=>'false', 'message'=>'Please Add Money'], 400 );
        }
    } else {
        return response()->json( ['Success'=>'true', 'message'=>'All ready Accept'], 400 );
    }
}
else{
    return response()->json( ['Success'=>'false', 'message'=>'Invalied country code'], 400 );
}

}
     




}
