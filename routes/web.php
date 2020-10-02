<?php

use Illuminate\Support\Facades\Route;
use App\Mail\VerificationMail;

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
    dd(Request::route()->getName());
    return view('welcome');
});

// Route::get('/emailV', function () {
  
//     // return new VerificationMail;
// });

Route::get('/donation', function (){
    return view('donation');
});

Route::post('/create-payment', 'donationController@create')->name('create-payment');
Route::get('/execute-payment', 'donationController@execute');


Route::get('/admin/login', function(){
    // dd(Request::route()->getName());
    return view('auth.login');
})->name('adminLogin');

// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('landing');
Route::get('/howtoadopt', 'HomeController@howToAdopt')->name('adopt1');
Route::get('/availablepets', 'HomeController@availablePets')->name('availpets');

Route::get('/map-maker', 'adminController@mapMaker');

// Route::get('/map', function(){

//     // return $_SERVER['REMOTE_ADDR']->postal_code;
//     dd(geoip()->getLocation('121.54.32.154'));
//     $map = geoip()->getLocation('175.158.210.181');
//     dd($map);
//     return view('welcome')->with('map', $map);
// });

// Route::get('/viewProfile/{user}/show', 'UserController@show')->middleware('verified')->name('viewProfile');
// Route::get('/editProfile/{user}/edit', 'UserController@edit')->middleware('verified')->name('editProfile');
// Route::resource('/users', 'UserController')->middleware('verified')->middleware('verified');
// Route::resource('/pets', 'petController')->middleware('verified');
// Route::resource('/pets-requests', 'adoptionController')->middleware('verified');
// Route::resource('/incident', 'ReportController')->middleware('verified')->names([
//     'index' => 'incident'
// ]);

Route::group(['middleware' => ['verified']], function () {


Route::get('/viewProfile/{user}/show', 'UserController@show')->name('viewProfile');
Route::get('/editProfile/{user}/edit', 'UserController@edit')->name('editProfile');

Route::get('/home', 'adminController@index')->name('home');
Route::get('/pets', 'adminController@viewPets')->name('pets');
Route::get('/reports', 'adminController@viewReports')->name('reports');


Route::resource('/users', 'UserController');
Route::resource('/pets', 'petController');
Route::resource('/pets-requests', 'adoptionController');
Route::resource('/incident', 'ReportController')->names([
    'index' => 'incident'
]);


});
