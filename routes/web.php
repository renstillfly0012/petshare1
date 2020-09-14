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

// Auth::routes();

Auth::routes(['verify' => true]);


Route::get('/home', 'adminController@index')->middleware('verified')->name('home');
Route::get('/pets', 'adminController@viewPets')->middleware('verified')->name('pets');
Route::get('/reports', 'adminController@viewReports')->middleware('verified')->name('reports');




Route::get('/', 'HomeController@index')->name('landing');
Route::get('/howtoadopt', 'HomeController@howToAdopt')->name('adopt1');
Route::get('/availablepets', 'HomeController@availablePets')->name('availpets');

Route::resource('/users', 'UserController')->middleware('verified');
Route::resource('/pets', 'petController')->middleware('verified');
Route::resource('/pets-requests', 'adoptionController')->middleware('verified');

