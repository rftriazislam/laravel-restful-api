<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\BDTraveller;
use App\INDTraveller;
use App\PakTraveller;
use App\SingaporeTraveller;
use App\Country;
use Image;
class TravellerController extends Controller
 {

    public function inserttraveller( Request $Req )
 {

        $country = $Req->country_code;

        if ( $country == +880 ) {
            $validator = Validator::make( $Req->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:bd_users,id',
                'mobile_verification'=>'required|string',
                'email_verification'=>'required|string',
                'NID_verification'=>'required|string',
                'NID_number'=>'required|string',
                'security_money'=>'required|integer',
                'resident_verification'=>'required|string',
                'agent_verification'=>'sometimes|nullable|string',
                'sucessfull_delivery_count'=>'required|boolean',
                'unsucessfull_delivery'=>'required|boolean',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travelleradd = new BDTraveller;
            $travelleradd->country_code = $Req->country_code;
            $travelleradd->user_id = $Req->user_id;
            $travelleradd->mobile_verification = $Req->mobile_verification;
            $travelleradd->email_verification = $Req->email_verification;
            $travelleradd->NID_verification = $Req->NID_verification;
            $travelleradd->NID_number = $Req->NID_number;
            $travelleradd->security_money = $Req->security_money;
            $travelleradd->resident_verification = $Req->resident_verification;
            $travelleradd->agent_verification = $Req->agent_verification;
            $travelleradd->sucessfull_delivery_count = $Req->sucessfull_delivery_count;
            $travelleradd->unsucessfull_delivery = $Req->unsucessfull_delivery;

            if ( $travelleradd->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Bangadesh Traveller  Succssfully Added'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }
        } else if ( $country == +91 ) {

            $validator = Validator::make( $Req->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:ind_users,id',
                'mobile_verification'=>'required|string',
                'email_verification'=>'required|string',
                'NID_verification'=>'required|string',
                'NID_number'=>'required|string',
                'security_money'=>'required|integer',
                'resident_verification'=>'required|string',
                'agent_verification'=>'sometimes|nullable|string',
                'sucessfull_delivery_count'=>'required|boolean',
                'unsucessfull_delivery'=>'required|boolean',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travelleradd = new INDTraveller;
            $travelleradd->country_code = $Req->country_code;
            $travelleradd->user_id = $Req->user_id;
            $travelleradd->mobile_verification = $Req->mobile_verification;
            $travelleradd->email_verification = $Req->email_verification;
            $travelleradd->NID_verification = $Req->NID_verification;
            $travelleradd->NID_number = $Req->NID_number;
            $travelleradd->security_money = $Req->security_money;
            $travelleradd->resident_verification = $Req->resident_verification;
            $travelleradd->agent_verification = $Req->agent_verification;
            $travelleradd->sucessfull_delivery_count = $Req->sucessfull_delivery_count;
            $travelleradd->unsucessfull_delivery = $Req->unsucessfull_delivery;

            if ( $travelleradd->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'India Traveller  Succssfully Added'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }

        } else if ( $country == +92 ) {

            $validator = Validator::make( $Req->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:pak_users,id',
                'mobile_verification'=>'required|string',
                'email_verification'=>'required|string',
                'NID_verification'=>'required|string',
                'NID_number'=>'required|string',
                'security_money'=>'required|integer',
                'resident_verification'=>'required|string',
                'agent_verification'=>'sometimes|nullable|string',
                'sucessfull_delivery_count'=>'required|boolean',
                'unsucessfull_delivery'=>'required|boolean',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travelleradd = new PakTraveller;
            $travelleradd->country_code = $Req->country_code;
            $travelleradd->user_id = $Req->user_id;
            $travelleradd->mobile_verification = $Req->mobile_verification;
            $travelleradd->email_verification = $Req->email_verification;
            $travelleradd->NID_verification = $Req->NID_verification;
            $travelleradd->NID_number = $Req->NID_number;
            $travelleradd->security_money = $Req->security_money;
            $travelleradd->resident_verification = $Req->resident_verification;
            $travelleradd->agent_verification = $Req->agent_verification;
            $travelleradd->sucessfull_delivery_count = $Req->sucessfull_delivery_count;
            $travelleradd->unsucessfull_delivery = $Req->unsucessfull_delivery;

            if ( $travelleradd->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Pakistan Traveller  Succssfully Added'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }

        } else if ( $country == +65 ) {

            $validator = Validator::make( $Req->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:singapore_users,id',
                'mobile_verification'=>'required|string',
                'email_verification'=>'required|string',
                'NID_verification'=>'required|string',
                'NID_number'=>'required|string',
                'security_money'=>'required|integer',
                'resident_verification'=>'required|string',
                'agent_verification'=>'sometimes|nullable|string',
                'sucessfull_delivery_count'=>'required|boolean',
                'unsucessfull_delivery'=>'required|boolean',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travelleradd = new SingaporeTraveller;
            $travelleradd->country_code = $Req->country_code;
            $travelleradd->user_id = $Req->user_id;
            $travelleradd->mobile_verification = $Req->mobile_verification;
            $travelleradd->email_verification = $Req->email_verification;
            $travelleradd->NID_verification = $Req->NID_verification;
            $travelleradd->NID_number = $Req->NID_number;
            $travelleradd->security_money = $Req->security_money;
            $travelleradd->resident_verification = $Req->resident_verification;
            $travelleradd->agent_verification = $Req->agent_verification;
            $travelleradd->sucessfull_delivery_count = $Req->sucessfull_delivery_count;
            $travelleradd->unsucessfull_delivery = $Req->unsucessfull_delivery;

            if ( $travelleradd->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Singapore Traveller  Succssfully Added'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }

        } else {
            return response()->json( ['success'=>'Country code did not Match.'], 400 );

        }

    }

    public function travellerUpdate( Request $Req, $country_code, $traveller_id ) {

        if ( $country_code == +880 ) {
            $validator = Validator::make( $Req->all(), [
                'country_code'=>'sometimes|exists:countries,country_code',
                'user_id'=>'sometimes|exists:bd_users,id',
                'mobile_verification'=>'sometimes|string',
                'email_verification'=>'sometimes|string',
                'NID_verification'=>'sometimes|string',
                'NID_number'=>'sometimes|string',
                'security_money'=>'sometimes|integer',
                'resident_verification'=>'sometimes|string',
                'self_video'=>'sometimes',
                'NID_image'=>'sometimes',


            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travellerupdate = BDTraveller::where( 'id', $traveller_id )->first();
            $travellerupdate->country_code = $Req->country_code;
            $travellerupdate->user_id = $Req->user_id;
            $travellerupdate->mobile_verification = $Req->mobile_verification;
            $travellerupdate->email_verification = $Req->email_verification;
            $travellerupdate->NID_verification = $Req->NID_verification;
            $travellerupdate->NID_number = $Req->NID_number;
            $travellerupdate->security_money = $Req->security_money;
            $travellerupdate->resident_verification = $Req->resident_verification;

            if ( $Req->hasfile( 'self_video' ) ) {

                $file = $Req->file( 'self_video' );
                if ( $file->isValid() ) {
                    $filename = $file->getClientOriginalName();

                    $path = 'self_video/bd_self_video/';
                    $file->move( $path, $filename );
                    $travellerupdate->self_video = $filename;
                }
            }

            if($file = $Req->file("NID_image")){
                $images = Image::canvas(300,300);
                $image  = Image::make($file->getRealPath())->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                });
                $images->insert($image, 'center');
                $nameReplacer = $traveller_id. '.' . $file->getClientOriginalExtension();
                $image_path = public_path().'/NID_image/bd_NID_image/'. $traveller_id.'.'.$file->getClientOriginalExtension();
               if($nameReplacer==$image_path){
               unlink($image_path);
               }else{
                  $images->save(public_path().'/NID_image/bd_NID_image/'.$nameReplacer);
                  }
               $travellerupdate->NID_image =$nameReplacer;
               }



            if ( $travellerupdate->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Bangladesh Traveller  Succssfully Update'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }
        } elseif ( $country_code == +91 ) {
            $validator = Validator::make( $Req->all(), [
                'country_code'=>'sometimes|exists:countries,country_code',
                'user_id'=>'sometimes|exists:ind_users,id',
                'mobile_verification'=>'sometimes|string',
                'email_verification'=>'sometimes|string',
                'NID_verification'=>'sometimes|string',
                'NID_number'=>'sometimes|string',
                'security_money'=>'sometimes|integer',
                'resident_verification'=>'sometimes|string',
                'self_video'=>'sometimes',
                'NID_image'=>'sometimes',

            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travellerupdate = INDTraveller::where( 'id', $traveller_id )->first();
            $travellerupdate->country_code = $Req->country_code;
            $travellerupdate->user_id = $Req->user_id;
            $travellerupdate->mobile_verification = $Req->mobile_verification;
            $travellerupdate->email_verification = $Req->email_verification;
            $travellerupdate->NID_verification = $Req->NID_verification;
            $travellerupdate->NID_number = $Req->NID_number;
            $travellerupdate->security_money = $Req->security_money;
            $travellerupdate->resident_verification = $Req->resident_verification;

            if ( $Req->hasfile( 'self_video' ) ) {

                $file = $Req->file( 'self_video' );
                if ( $file->isValid() ) {
                    $filename = $file->getClientOriginalName();

                    $path = 'self_video/ind_self_video/';
                    $file->move( $path, $filename );
                    $travellerupdate->self_video = $filename;
                }
            }
            if($file = $Req->file("NID_image")){
                $images = Image::canvas(300,300);
                $image  = Image::make($file->getRealPath())->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                });
                $images->insert($image, 'center');
                $nameReplacer = $traveller_id. '.' . $file->getClientOriginalExtension();
                $image_path = public_path().'/NID_image/ind_NID_image/'. $traveller_id.'.'.$file->getClientOriginalExtension();
               if($nameReplacer==$image_path){
               unlink($image_path);
               }else{
                  $images->save(public_path().'/NID_image/ind_NID_image/'.$nameReplacer);
                  }
               $travellerupdate->NID_image =$nameReplacer;
               }

            if ( $travellerupdate->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'India Traveller  Succssfully Update'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }
        } elseif ( $country_code == +92 ) {
            $validator = Validator::make( $Req->all(), [
                'country_code'=>'sometimes|exists:countries,country_code',
                'user_id'=>'sometimes|exists:pak_users,id',
                'mobile_verification'=>'sometimes|string',
                'email_verification'=>'sometimes|string',
                'NID_verification'=>'sometimes|string',
                'NID_number'=>'sometimes|string',
                'security_money'=>'sometimes|integer',
                'resident_verification'=>'sometimes|string',
                'self_video'=>'sometimes',
                'NID_image'=>'sometimes',

            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travellerupdate = PakTraveller::where( 'id', $traveller_id )->first();
            $travellerupdate->country_code = $Req->country_code;
            $travellerupdate->user_id = $Req->user_id;
            $travellerupdate->mobile_verification = $Req->mobile_verification;
            $travellerupdate->email_verification = $Req->email_verification;
            $travellerupdate->NID_verification = $Req->NID_verification;
            $travellerupdate->NID_number = $Req->NID_number;
            $travellerupdate->security_money = $Req->security_money;
            $travellerupdate->resident_verification = $Req->resident_verification;

            if ( $Req->hasfile( 'self_video' ) ) {

                $file = $Req->file( 'self_video' );
                if ( $file->isValid() ) {
                    $filename = $file->getClientOriginalName();

                    $path = 'self_video/pak_self_video/';
                    $file->move( $path, $filename );
                    $travellerupdate->self_video = $filename;
                }
            }
            if($file = $Req->file("NID_image")){
                $images = Image::canvas(300,300);
                $image  = Image::make($file->getRealPath())->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                });
                $images->insert($image, 'center');
                $nameReplacer = $traveller_id. '.' . $file->getClientOriginalExtension();
                $image_path = public_path().'/NID_image/pak_NID_image/'. $traveller_id.'.'.$file->getClientOriginalExtension();
               if($nameReplacer==$image_path){
               unlink($image_path);
               }else{
                  $images->save(public_path().'/NID_image/pak_NID_image/'.$nameReplacer);
                  }
               $travellerupdate->NID_image =$nameReplacer;
               }

            if ( $travellerupdate->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Pakistan Traveller  Succssfully Update'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }
        } elseif ( $country_code == +65 ) {

            $validator = Validator::make( $Req->all(), [
                'country_code'=>'sometimes|exists:countries,country_code',
                'user_id'=>'sometimes|exists:singapore_users,id',
                'mobile_verification'=>'sometimes|string',
                'email_verification'=>'sometimes|string',
                'NID_verification'=>'sometimes|string',
                'NID_number'=>'sometimes|string',
                'security_money'=>'sometimes|integer',
                'resident_verification'=>'sometimes|string',
                'self_video'=>'sometimes',
                'NID_image'=>'sometimes',

            ] );

            if ( $validator->fails() ) {
                return response()->json( [$validator->errors()], 400 );
            }

            $travellerupdate = SingaporeTraveller::where( 'id', $traveller_id )->first();
            $travellerupdate->country_code = $Req->country_code;
            $travellerupdate->user_id = $Req->user_id;
            $travellerupdate->mobile_verification = $Req->mobile_verification;
            $travellerupdate->email_verification = $Req->email_verification;
            $travellerupdate->NID_verification = $Req->NID_verification;
            $travellerupdate->NID_number = $Req->NID_number;
            $travellerupdate->security_money = $Req->security_money;
            $travellerupdate->resident_verification = $Req->resident_verification;

            if ( $Req->hasfile( 'self_video' ) ) {

                $file = $Req->file( 'self_video' );
                if ( $file->isValid() ) {
                    $filename = $file->getClientOriginalName();

                    $path = 'self_video/singapore_self_video/';
                    $file->move( $path, $filename );
                    $travellerupdate->self_video = $filename;
                }
            }
            if($file = $Req->file("NID_image")){
                $images = Image::canvas(300,300);
                $image  = Image::make($file->getRealPath())->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                });
                $images->insert($image, 'center');
                $nameReplacer = $traveller_id. '.' . $file->getClientOriginalExtension();
                $image_path = public_path().'/NID_image/singapore_NID_image/'. $traveller_id.'.'.$file->getClientOriginalExtension();
               if($nameReplacer==$image_path){
               unlink($image_path);
               }else{
                  $images->save(public_path().'/NID_image/singapore_NID_image/'.$nameReplacer);
                  }
               $travellerupdate->NID_image =$nameReplacer;
               }

            if ( $travellerupdate->save() ) {
                return response()->json( ['success'=>'true', 'message'=>'Singapore Traveller  Succssfully Update'], 200 );
            } else {
                return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
            }
        } else {
            return response()->json( ['success'=>'Country code did not Match.'], 400 );
        }

    }

   

}
