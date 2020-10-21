<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/Country_Add','CountryController@createCountry');
// Route::post('/SignUp/{country_code}','AuthController@createsignup');
// Route::post('/Login/{country_code}','AuthController@login');



Route::group(
    [
        'prefix'=>'AllCountry'
    ],function ()
    {
        Route::post('/Country_Add','CountryController@createCountry');
        Route::post('/SignUp/{country_code}','AuthController@createsignup');
        Route::post('/Login/{country_code}','AuthController@login');
       

        Route::middleware('auth:india,bangladesh,pakistan,singapore')->group (function () {
        
            //All Post Request
            Route::post('/Travellers-Create','TravellerController@inserttraveller'); 
            Route::post('/Service-Create','ServiceController@insertservice');
            Route::post('/ServiceRequest-Calculation','ServiceRequestController@ServiceRequestCalculation');
            Route::post('/ServiceRequest-Create','ServiceRequestController@insertservicerequest');
            Route::post('/TagService-Create','TagServiceRequestController@inserttagservice');
            Route::post('/Agent-Create','AgentController@insertagent');

            Route::post('/Rating-Create','RatingController@insertrating');
            Route::get('/AllRating/{country_id}','GetAllRatingController@GetAllRating');
            Route::get('/AllRatingUser/{country_id}/{user_id}','GetAllRatingController@GetAllRatingUser');
            Route::get('/AllRatingSingleUser/{country_id}/{user_id}','GetAllRatingController@GetAllRatingSingleUser');

            //All Get Request
            Route::get('/AllService/{country_code}','GetAllServiceController@AllCountryServiceController');

            
            Route::get('/PersonalService/{user_id}/{country_code}','GetAllServiceController@personalservice');
            Route::get('/PersonalServiceTake/{user_id}/{country_code}','TakeServiceController@Personalservicetake');
            //All Get Sucessfull Delivery
            Route::get('/Successfull_delivery/{country_code}','SuccessfullDeliveryController@getSucessfullDelivery');
            Route::post('/Traveller-accept-request/{request_tag_service_id}','TagServiceRequestController@TravellerAcceptRequest');

            
            Route::get('/AllTraveller/{country_code}','GetAllTravelleController@GetAlltraveller'); 
            
              //All Get Sucessfull Delivery
            // Route::get('/Successfull_delivery/{country_code}','SuccessfullDeliveryController@getSucessfullDelivery');
            // Route::post('/Traveller-accept-request/{request_tag_service_id}','TagServiceRequestController@TravellerAcceptRequest');
                //All Update Request
            Route::post('/profile-update/{country_code}/{user_id}','AuthController@profileupdate');
            Route::post('/Travellers-update/{country_code}/{traveller_id}','TravellerController@travellerUpdate'); 
          
 
            Route::get('/Search/{country_code}/{keyword}','SearchController@getSearch');

           

                
        });
        // Route::get('/Searchtest/{latravel_start_point_latitude}/{travel_start_point_longitude}','SearchController@getSearchtest');

        Route::get('/User-top-earn','UserController@getUserTopEarn');
        Route::get('/LandingPageTotalUsersDeliverysTravellers','TotalUserDeliveryTravellerController@landingpagetotaluserdeliverytraveller');
   
        Route::post('/Foreign-Services','ForeignServiceController@insertforeignservice');
        Route::post('/Foreign-Request_Services','ForeignServiceController@insertforeignrequestservices');
 
    });
 