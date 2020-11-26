<?php

use Illuminate\Support\Facades\Route;
use App\Mail\VerificationMail;
use App\Location;
use App\Content;
use Spatie\Activitylog\Models\Activity;
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






Route::get('/admin/login', function(){
    return view('auth.login');
})->name('adminLogin');

// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/login', function(){
    $contents = Content::where('id', 11)->get();
//    dd($contents[0]->content_image);
    return view('auth.login')->with('contents', $contents);
})->name('login');

Route::get('/register', function(){
    $contents = Content::where('id', 11)->get();
//    dd($contents[0]->content_image);
    return view('auth.register')->with('contents', $contents);
})->name('register');

Route::get('/', 'HomeController@index')->name('landing');
Route::get('/howtoadopt', 'HomeController@howToAdopt')->name('adopt1');
Route::get('/availablepets', 'HomeController@availablePets')->name('availpets');


Route::get('/map', function(){
    

    // return $_SERVER['REMOTE_ADDR']->postal_code;
    // dd(geoip()->getLocation(Request::ip())->currency);
    $map = geoip()->getLocation('175.158.210.181');
    $location = Location::all();
    // dd($map);
    return view('map')->with(compact('map'))
    ->with(compact('location'));
});


Route::group(['middleware' => ['verified']], function () {


Route::get('/viewProfile/{user}/show', 'UserController@show')->name('viewProfile');
Route::get('/editProfile/{user}/edit', 'UserController@edit')->name('editProfile');

Route::get('/home', 'adminController@index')->name('home');
Route::get('/home/{id}', 'adminController@show')->name('markedNotif');
Route::get('/pets', 'adminController@viewPets')->name('pets');
Route::get('/reports', 'adminController@viewReports')->name('reports');
Route::get('/donations', 'donationController@getAllDonations')->name('donations');


Route::resource('/users', 'UserController');
Route::resource('/pets', 'petController');
Route::resource('/pets-requests', 'adoptionController');
Route::resource('/incident', 'ReportController')->names([
    'index' => 'incident',
    
]);

// route::get('qrcode', function(){

//     $qrcodeImgName = 'QR_PET_ID_10.png';
//         $file = 'assets/images/qrcodes/'.$qrcodeImgName;
        
        
//         //generate qrcode
//         // $newQrcode = QRCode::text("petshare1.test/pethealth/view/".$new_pet_id)
//         $newQrcode = QRCode::text("https://pet-share.com/pethealth/view/10")
//         ->setSize(4)
//         ->setMargin(2)
//         ->setOutfile($file)
//         ->png();

//         return $newQrcode;

// });

Route::resource('/cms', 'cmsController')->names([
    'index' => 'cms']);

Route::prefix('pethealth')->group(function(){
    route::get('/all', 'petInfoController@index');
    route::get('view/{id}', 'petInfoController@show');
    route::post('/create', 'petInfoController@store');
    
});

Route::get('/audit', function(){

    $logs = Activity::orderBy('id', 'desc')->paginate(10);
    // dd(Route::currentRouteName());
    return view('admin.audit.all')->with('logs', $logs);
    
})->name('audit');


});


// Route::get('/donation', function (){
//     return view('donation');
// });

Route::post('/create-payment', 'donationController@create')->name('create-payment');
Route::get('/execute-payment/{amount}/{name}', 'donationController@execute');
