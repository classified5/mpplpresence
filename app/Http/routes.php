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

Route::get('/', function () {
    return view('home');
});


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'UserController@LoginValidation');

Route::get('/logout', 'UserController@logout');

Route::get('/input_presence', function() {
    return view('input_presence');
});

Route::get('/detail_presence', function (){
    return view('detail_presence');
});

Route::get('/report_presence', 'PresenceController@GetPresence');

Route::get('/report_presence_graph', function (){
    return view('report_presence_graph');
});

Route::get('/adduser', function (){
    return view('adduser');
});
Route::post('/adduser', 'AccountController@CreateAccount');

Route::get('/edituser', function (){
    return view('edituser');
});
Route::post('/edituser', 'AccountController@EditAccount');

Route::get('/deleteuser', function (){
    return view('deleteuser');
});
Route::post('/deleteuser', 'AccountController@DeleteAccount');


Route::get('/account-manager', 'AccountController@ListAccount');




Route::get('/pilih_kelas', 'ClassController@GetClass');



