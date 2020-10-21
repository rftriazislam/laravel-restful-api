<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//------------------------------------------admin----------------------------------



Route::get('/admin','Web\AdminController@index')->name('admin');
Route::post('/register','Web\FrontendController@register')->name('adminregister');



Route::get('/admin-BD-User','Web\AdminController@BDUser')->name('BDUser');
Route::get('/admin-BD-Traveller','Web\AdminController@BDTraveller')->name('BDTraveller');
Route::get('/admin-BD-Agent','Web\AdminController@BDAgent')->name('BDAgent');

Route::get('/admin-IND-User','Web\AdminController@INDUser')->name('INDUser');
Route::get('/admin-IND-Traveller','Web\AdminController@INDTraveller')->name('INDTraveller');
Route::get('/admin-IND-Agent','Web\AdminController@INDAgent')->name('INDAgent');

Route::get('/admin-PAK-User','Web\AdminController@PAKUser')->name('PAKUser');
Route::get('/admin-PAK-Traveller','Web\AdminController@PAKTraveller')->name('PAKTraveller');
Route::get('/admin-PAK-Agent','Web\AdminController@PAKAgent')->name('PAKAgent');

Route::get('/admin-userinfo','Web\AdminController@userinfo')->name('userinfo');


//----------------------------------------admin-------------------------------