<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BdRating;
use App\IndRating;
use App\PakRating;
use App\SingaporeRating;

use Validator;


class RatingController extends Controller
 {
    public function insertrating( Request $request ) {
        $country = $request->country_code;

        if ( $country == +880 ) {
            $validator = Validator::make( $request->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:bd_users,id',
                'services_id'=>'required|exists:bd_services,id',
                'review'=>'required|string',
                'rating_point'=>'required|string'
            ] );
            $user_id = BdRating::where( 'user_id', $request->user_id )->first();
            
            if ($user_id!=NULL) {
                return response()->json( ['success'=>'false', 'message'=>'All ready rating exists!'], 400 );

            } else {

                if ( $validator->fails() ) {
                    return response()->json( [$validator->errors()], 400 );
                }

                $bdratingadd = new BdRating;
                $bdratingadd->country_code = $request->country_code;
                $bdratingadd->user_id = $request->user_id;
                $bdratingadd->services_id = $request->services_id;
                $bdratingadd->review = $request->review;
                $bdratingadd->rating_point = $request->rating_point;
                if ( $bdratingadd->save() ) {
                    return response()->json( ['success'=>'true', 'message'=>'Bangadesh Rating  Succssfully Added'], 200 );
                } else {
                    return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
                }
            }

        } else if ( $country == +91 ) {
            $validator = Validator::make( $request->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:ind_users,id',
                'services_id'=>'required|exists:ind_services,id',
                'review'=>'required|string',
                'rating_point'=>'required|string'
            ] );
            $user_id = IndRating::where( 'user_id', $request->user_id )->first();
            
            if ($user_id!=NULL) {
                return response()->json( ['success'=>'false', 'message'=>'All ready rating exists!'], 400 );

            } else {

                if ( $validator->fails() ) {
                    return response()->json( [$validator->errors()], 400 );
                }

                $bdratingadd = new IndRating;
                $bdratingadd->country_code = $request->country_code;
                $bdratingadd->user_id = $request->user_id;
                $bdratingadd->services_id = $request->services_id;
                $bdratingadd->review = $request->review;
                $bdratingadd->rating_point = $request->rating_point;
                if ( $bdratingadd->save() ) {
                    return response()->json( ['success'=>'true', 'message'=>'India Rating  Succssfully Added'], 200 );
                } else {
                    return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
                }
            }

        } 
        else if ( $country == +92 ) {
            $validator = Validator::make( $request->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:pak_users,id',
                'services_id'=>'required|exists:pak_services,id',
                'review'=>'required|string',
                'rating_point'=>'required|string'
            ] );
            $user_id = PakRating::where( 'user_id', $request->user_id )->first();
            
            if ($user_id!=NULL) {
                return response()->json( ['success'=>'false', 'message'=>'All ready rating exists!'], 400 );

            } else {

                if ( $validator->fails() ) {
                    return response()->json( [$validator->errors()], 400 );
                }

                $bdratingadd = new PakRating;
                $bdratingadd->country_code = $request->country_code;
                $bdratingadd->user_id = $request->user_id;
                $bdratingadd->services_id = $request->services_id;
                $bdratingadd->review = $request->review;
                $bdratingadd->rating_point = $request->rating_point;
                if ( $bdratingadd->save() ) {
                    return response()->json( ['success'=>'true', 'message'=>'Pakistan Rating  Succssfully Added'], 200 );
                } else {
                    return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
                }
            }

        } 
        else if ( $country == +65 ) {
            $validator = Validator::make( $request->all(), [
                'country_code'=>'required|exists:countries,country_code',
                'user_id'=>'required|exists:singapore_users,id',
                'services_id'=>'required|exists:singapore_services,id',
                'review'=>'required|string',
                'rating_point'=>'required|string'
            ] );
            $user_id = SingaporeRating::where( 'user_id', $request->user_id )->first();
            
            if ($user_id!=NULL) {
                return response()->json( ['success'=>'false', 'message'=>'All ready rating exists!'], 400 );

            } else {

                if ( $validator->fails() ) {
                    return response()->json( [$validator->errors()], 400 );
                }

                $bdratingadd = new SingaporeRating;
                $bdratingadd->country_code = $request->country_code;
                $bdratingadd->user_id = $request->user_id;
                $bdratingadd->services_id = $request->services_id;
                $bdratingadd->review = $request->review;
                $bdratingadd->rating_point = $request->rating_point;
                if ( $bdratingadd->save() ) {
                    return response()->json( ['success'=>'true', 'message'=>'Singapore Rating  Succssfully Added'], 200 );
                } else {
                    return response()->json( ['success'=>'false', 'message'=>'something went wrong'], 400 );
                }
            }

        } else {
            return response()->json(['success'=>'false','message'=>'Invalied country code!'],400);
        }

    }
}
