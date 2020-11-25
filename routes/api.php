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

Route::prefix('guest')->group(function() {
    route::get('/users', 'Api\userController@index');
    route::get('/login', 'Api\userController@login');
    route::post('/register', 'Api\userController@store');
});

Route::prefix('user')->group(function(){
    route::get('/viewallpets', 'Api\petController@index');
    route::get('/view-pet/{pet}', 'Api\petController@show');
    route::post('/adoptPet', 'Api\adoptionController@store');
    route::get('/allrequests', 'Api\adoptionController@index');

    Route::prefix('donation')->group(function(){
        route::post('/create', 'Api\donationController@storeDonation');
    });

    Route::prefix('reports')->group(function(){
        route::post('/create', 'Api\reportController@store');
    });
    
});

Route::prefix('admin')->group(function(){

    Route::prefix('users')->group(function(){
    route::get('/all', 'Api\userController@index');
    route::get('/view/{user}', 'Api\userController@show');
    route::post('/register', 'Api\userController@storeAdmin');
    route::put('/edit/{id}', 'Api\userController@update');
    route::delete('/delete/{id}', 'Api\userController@destroy');
    });

    Route::prefix('pets')->group(function(){
        route::get('/all', 'Api\petController@index');
        route::get('/view-pet/{id}', 'Api\petController@show');
        route::post('/create','Api\petController@store');
        route::put('/edit/{id}', 'Api\petController@update');
        route::delete('/delete/{id}', 'Api\petController@destroy');
    });
    

    Route::prefix('pethealth')->group(function(){
        route::get('/all', 'Api\petInfoController@index');
        route::get('view/{id}', 'Api\petInfoController@show');
        route::post('/create', 'Api\petInfoController@store');
        
    });

    Route::prefix('donation')->group(function(){
        route::get('/all', 'Api\donationController@getAllDonations');
        // route::post('/create', 'Api\donationController@storeDonation');
    });

    Route::prefix('reports')->group(function(){
        route::get('/all', 'Api\reportController@index');
        // route::post('/create', 'Api\reportController@store');
    });
});

