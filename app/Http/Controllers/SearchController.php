<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BDService;
use App\INDService;
use App\PakService;
use App\SingaporeService;
use DB;

class SearchController extends Controller
 {

    public function getSearch( Request $request, $country_code) {

if($country_code==+880){

    $search = BDService::all()->where( 'status', 1 );
    $travel_start_point = array();
    $travel_end_point = array();
    $travel_all_point = array();
    $i = 0;
    foreach ( $search as $latitude ) {

        $lat1 = $request->travel_start_point_latitude;
        $lon1 = $request->travel_start_point_longitude;
        //------------------------------travel------start -----point----------------------------------------

        $lat2 = $latitude->travel_start_point_latitude ;
        $lon2 = $latitude->travel_start_point_longitude ;
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797;
        // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin( $dlat / 2 ) * sin( $dlat / 2 ) + cos( $lat1 ) * cos( $lat2 ) * sin( $dlon / 2 ) * sin( $dlon / 2 );
        $c = 2 * atan2( sqrt( $a ), sqrt( 1 - $a ) );
        $km = $r * $c;
        // echo '<br/>'.$km;
        if ( $km <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } else {
                $username = BDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            }

        }

        //------------------------------travel------end -----point----------------------------------------

        $lat1_end = $request->travel_end_point_latitude;
        $lon1_end = $request->travel_end_point_longitude;
        $lat2_end = $latitude->travel_end_point_latitude;
        $lon2_end = $latitude->travel_end_point_longitude ;
        $pi80_end = M_PI / 180;
        $lat1_end *= $pi80_end;
        $lon1_end  *= $pi80_end;
        $lat2_end = $lat2_end*$pi80_end;
        $lon2_end *= $pi80_end;
        $r_end = 6372.797;
        // mean radius of Earth in km
        $dlat_end = $lat2_end -$lat1_end;
        $dlon_end = $lon2_end -  $lon1_end ;
        $a_end = sin( $dlat_end / 2 ) * sin( $dlat_end / 2 ) + cos( $lat1_end ) * cos( $lat2_end ) * sin( $dlon_end / 2 ) * sin( $dlon_end / 2 );
        $c_end = 2 * atan2( sqrt( $a_end ), sqrt( 1 - $a_end ) );
        $km_end = $r_end * $c_end;

        if ( $km_end <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } else {
                $username = BDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            }

        }
        //-----------------------------------------4 data search----------------------------
        if ( $km <= 20 && $km_end <= 20 ) {

            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = BDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } else {
                $username = BDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            }

        }

    }

    if ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {

        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->starting_date && $request->ending_date ) {
        $search = BDService::where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
        if ( $search == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
        }
    } elseif ( $request->starting_date || $request->ending_date ) {
        if ( $request->starting_date ) {
            $search = BDService::where( 'starting_date', $request->starting_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }
        } else {
            $search = BDService::where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }

        }

    }

}elseif($country_code==+91){




    $search = INDService::all()->where( 'status', 1 );
    $travel_start_point = array();
    $travel_end_point = array();
    $travel_all_point = array();
    $i = 0;
    foreach ( $search as $latitude ) {

        $lat1 = $request->travel_start_point_latitude;
        $lon1 = $request->travel_start_point_longitude;
        //------------------------------travel------start -----point----------------------------------------

        $lat2 = $latitude->travel_start_point_latitude ;
        $lon2 = $latitude->travel_start_point_longitude ;
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797;
        // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin( $dlat / 2 ) * sin( $dlat / 2 ) + cos( $lat1 ) * cos( $lat2 ) * sin( $dlon / 2 ) * sin( $dlon / 2 );
        $c = 2 * atan2( sqrt( $a ), sqrt( 1 - $a ) );
        $km = $r * $c;
        // echo '<br/>'.$km;
        if ( $km <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } else {
                $username = INDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            }

        }

        //------------------------------travel------end -----point----------------------------------------

        $lat1_end = $request->travel_end_point_latitude;
        $lon1_end = $request->travel_end_point_longitude;
        $lat2_end = $latitude->travel_end_point_latitude;
        $lon2_end = $latitude->travel_end_point_longitude ;
        $pi80_end = M_PI / 180;
        $lat1_end *= $pi80_end;
        $lon1_end  *= $pi80_end;
        $lat2_end = $lat2_end*$pi80_end;
        $lon2_end *= $pi80_end;
        $r_end = 6372.797;
        // mean radius of Earth in km
        $dlat_end = $lat2_end -$lat1_end;
        $dlon_end = $lon2_end -  $lon1_end ;
        $a_end = sin( $dlat_end / 2 ) * sin( $dlat_end / 2 ) + cos( $lat1_end ) * cos( $lat2_end ) * sin( $dlon_end / 2 ) * sin( $dlon_end / 2 );
        $c_end = 2 * atan2( sqrt( $a_end ), sqrt( 1 - $a_end ) );
        $km_end = $r_end * $c_end;

        if ( $km_end <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username =INDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } else {
                $username = INDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            }

        }
        //-----------------------------------------4 data search----------------------------
        if ( $km <= 20 && $km_end <= 20 ) {

            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = INDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } else {
                $username = INDService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            }

        }

    }

    if ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {

        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->starting_date && $request->ending_date ) {
        $search = INDService::where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
        if ( $search == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
        }
    } elseif ( $request->starting_date || $request->ending_date ) {
        if ( $request->starting_date ) {
            $search = INDService::where( 'starting_date', $request->starting_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }
        } else {
            $search = INDService::where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }

        }

    }

}elseif($country_code==+92){
   


    $search = PakService::all()->where( 'status', 1 );
    $travel_start_point = array();
    $travel_end_point = array();
    $travel_all_point = array();
    $i = 0;
    foreach ( $search as $latitude ) {

        $lat1 = $request->travel_start_point_latitude;
        $lon1 = $request->travel_start_point_longitude;
        //------------------------------travel------start -----point----------------------------------------

        $lat2 = $latitude->travel_start_point_latitude ;
        $lon2 = $latitude->travel_start_point_longitude ;
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797;
        // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin( $dlat / 2 ) * sin( $dlat / 2 ) + cos( $lat1 ) * cos( $lat2 ) * sin( $dlon / 2 ) * sin( $dlon / 2 );
        $c = 2 * atan2( sqrt( $a ), sqrt( 1 - $a ) );
        $km = $r * $c;
        // echo '<br/>'.$km;
        if ( $km <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } else {
                $username = PakService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            }

        }

        //------------------------------travel------end -----point----------------------------------------

        $lat1_end = $request->travel_end_point_latitude;
        $lon1_end = $request->travel_end_point_longitude;
        $lat2_end = $latitude->travel_end_point_latitude;
        $lon2_end = $latitude->travel_end_point_longitude ;
        $pi80_end = M_PI / 180;
        $lat1_end *= $pi80_end;
        $lon1_end  *= $pi80_end;
        $lat2_end = $lat2_end*$pi80_end;
        $lon2_end *= $pi80_end;
        $r_end = 6372.797;
        // mean radius of Earth in km
        $dlat_end = $lat2_end -$lat1_end;
        $dlon_end = $lon2_end -  $lon1_end ;
        $a_end = sin( $dlat_end / 2 ) * sin( $dlat_end / 2 ) + cos( $lat1_end ) * cos( $lat2_end ) * sin( $dlon_end / 2 ) * sin( $dlon_end / 2 );
        $c_end = 2 * atan2( sqrt( $a_end ), sqrt( 1 - $a_end ) );
        $km_end = $r_end * $c_end;

        if ( $km_end <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username =PakService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } else {
                $username = PakService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            }

        }
        //-----------------------------------------4 data search----------------------------
        if ( $km <= 20 && $km_end <= 20 ) {

            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = PakService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } else {
                $username = PakService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            }

        }

    }

    if ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {

        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->starting_date && $request->ending_date ) {
        $search = PakService::where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
        if ( $search == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
        }
    } elseif ( $request->starting_date || $request->ending_date ) {
        if ( $request->starting_date ) {
            $search = PakService::where( 'starting_date', $request->starting_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }
        } else {
            $search = PakService::where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }

        }

    }
}elseif($country_code==+65){



    $search = SingaporeService::all()->where( 'status', 1 );
    $travel_start_point = array();
    $travel_end_point = array();
    $travel_all_point = array();
    $i = 0;
    foreach ( $search as $latitude ) {

        $lat1 = $request->travel_start_point_latitude;
        $lon1 = $request->travel_start_point_longitude;
        //------------------------------travel------start -----point----------------------------------------

        $lat2 = $latitude->travel_start_point_latitude ;
        $lon2 = $latitude->travel_start_point_longitude ;
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797;
        // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin( $dlat / 2 ) * sin( $dlat / 2 ) + cos( $lat1 ) * cos( $lat2 ) * sin( $dlon / 2 ) * sin( $dlon / 2 );
        $c = 2 * atan2( sqrt( $a ), sqrt( 1 - $a ) );
        $km = $r * $c;
        // echo '<br/>'.$km;
        if ( $km <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            } else {
                $username = SingaporeService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_start_point[$i++] = $username;
            }

        }

        //------------------------------travel------end -----point----------------------------------------

        $lat1_end = $request->travel_end_point_latitude;
        $lon1_end = $request->travel_end_point_longitude;
        $lat2_end = $latitude->travel_end_point_latitude;
        $lon2_end = $latitude->travel_end_point_longitude ;
        $pi80_end = M_PI / 180;
        $lat1_end *= $pi80_end;
        $lon1_end  *= $pi80_end;
        $lat2_end = $lat2_end*$pi80_end;
        $lon2_end *= $pi80_end;
        $r_end = 6372.797;
        // mean radius of Earth in km
        $dlat_end = $lat2_end -$lat1_end;
        $dlon_end = $lon2_end -  $lon1_end ;
        $a_end = sin( $dlat_end / 2 ) * sin( $dlat_end / 2 ) + cos( $lat1_end ) * cos( $lat2_end ) * sin( $dlon_end / 2 ) * sin( $dlon_end / 2 );
        $c_end = 2 * atan2( sqrt( $a_end ), sqrt( 1 - $a_end ) );
        $km_end = $r_end * $c_end;

        if ( $km_end <= 20 ) {
            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username =INDService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            } else {
                $username = SingaporeService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_end_point[$i++] = $username;
            }

        }
        //-----------------------------------------4 data search----------------------------
        if ( $km <= 20 && $km_end <= 20 ) {

            if ( $request->ending_date != NULL && $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->starting_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'starting_date', $request->starting_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } elseif ( $request->ending_date != NULL ) {
                $username = SingaporeService::where( 'id', $latitude->id )->where( 'ending_date', $request->ending_date )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            } else {
                $username = SingaporeService::where( 'id', $latitude->id )
                ->OrderBy( 'id', 'Desc' )->get();
                $travel_all_point[$i++] = $username;
            }

        }

    }

    if ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_all_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_all_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL ) {

        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_end_point_latitude != NULL && $request->travel_end_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_end_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_end_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->travel_start_point_latitude != NULL && $request->travel_start_point_longitude != NULL && $request->starting_date != NULL && $request->ending_date != NULL ) {
        if ( $travel_start_point == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$travel_start_point], 200 );
        }
    } elseif ( $request->starting_date && $request->ending_date ) {
        $search = SingaporeService::where( 'starting_date', $request->starting_date )->where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
        if ( $search == NULL ) {
            return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
        } else {
            return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
        }
    } elseif ( $request->starting_date || $request->ending_date ) {
        if ( $request->starting_date ) {
            $search = SingaporeService::where( 'starting_date', $request->starting_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }
        } else {
            $search = SingaporeService::where( 'ending_date', $request->ending_date )->where( 'status', 1 )->get();
            if ( $search == NULL ) {
                return response()->json( ['success'=>'false', 'message'=>'Did not Found!'], 200 );
            } else {
                return response()->json( ['success'=>'true', 'Search For Information'=>$search], 200 );
            }

        }

    }
}else{
    return response()->json( ['success'=>'flase', 'message'=>'Invalied country code'], 200 );
}


    }


  
}
