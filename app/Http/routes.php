<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['as' => 'home', 'uses' => 'UserController@home']);
// Route::get('/tentang-kami', ['as' => 'front.tentang-kami', function(){
//         return view('front.home.tentang-kami');
//     }]);
// Route::get('/login', ['as' => 'front.login', 'uses' => 'AuthController@showLoginForm']);
Route::get('/login', ['as' => 'login', function () {
    return view('login');
}]);
Route::post('/login', ['as' => 'login.post', 'uses' => 'UserController@loginValidation']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
Route::get('/input_presence', ['as' => 'inputpresence',  'uses' => 'PresenceController@input_presence']);
Route::post('/detail_presence', ['as' => 'detailpresence', 'uses' => 'PresenceController@detail_presence']);
Route::post('/submit_presence', ['as' => 'submitpresence', 'uses' => 'PresenceController@submit_presence']);
Route::get('/report_presence', ['as' => 'reportpresence', 'uses' => 'PresenceController@getPresence']);
Route::get('/report_presence_graph', ['as' => 'reportpresencegraph',function (){
    return view('report_presence_graph');
}]);
Route::get('/adduser', ['as' => 'adduser', function (){
    return view('adduser');
}]);
Route::get('/edituser', ['as' => 'edituser', function (){
    return view('edituser');
}]);
Route::get('/deleteuser', ['as' => 'deleteuser', function (){
    return view('deleteuser');
}]);
Route::get('/pilih_kelas/{id}', ['as' => 'pilihkelas', 'uses' => 'ClassController@getClass']);

Route::get('/rekap', ['as' => 'rekap', 'uses' => 'PresenceController@getRekap']);

Route::get('/detail_rekap', ['as' => 'detailrekap', 'uses' => 'PresenceController@detailRekap']);

Route::get('/presence_mahasiswa', ['as' => 'presencemahasiswa', 'uses' => 'PresenceController@presenceMahasiswa']);

Route::get('/detail_presence_mahasiswa', ['as' => 'detailpresencemahsiswa', 'uses' => 'PresenceController@detailPresenceMahasiswa']);

Route::post('/adduser', 'AccountController@CreateAccount');
Route::post('/edituser', 'AccountController@EditAccount');
Route::post('/edituserYes', 'AccountController@EditAccountYes');
Route::post('/deleteuser','AccountController@DeleteAccount');
Route::get('/account-manager', ['as' => 'account-manager', 'uses' => 'AccountController@ListAccount']);

Route::get('/profil', ['as' => 'profil', 'uses' => 'UserController@get_profil']);
