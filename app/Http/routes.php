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

Route::get('/report_presence', function (){
    return view('report_presence');
});

Route::get('/report_presence_graph', function (){
    return view('report_presence_graph');
});

Route::get('/adduser', function (){
    return view('adduser');
});

Route::get('/edituser', function (){
    return view('edituser');
});

Route::get('/deleteuser', function (){
    return view('deleteuser');
});

Route::get('/pilih_kelas', 'ClassController@GetClass');

// Route::get('/detail_schedule', function () {
//     return view('detail_schedule');
// });


// Route::get('/detail_presence', function () {
//     return view('detail_presence');
// });

// Route::get('/schedule', 'ScheduleController@index');

// Route::get('/edit_schedule', function() {
//     return view('edit_schedule');
// });

// Route::get('/presence', 'PresenceController@checkPresence');
// Route::get('/presence/history/{id}', 'PresenceController@checkHistory');


// Route::get('/historya', function() {
//     return view('historya');
// });


// Route::get('/user', 'UserController@index');


// Route::get('/adduser', function () {
//     return view('adduser');
// });
   

// Route::get('/edituser', function () {
//     return view('edituser');
// });



// Route::get('/input_presence', function () {
//     return view('input_presence');
// });



// Route::get('/admin', function () {
//     return view('admin_template');
// });

// Route::get('test', 'TestController@index');

// Route::get('/scanner', 'PresenceController@checkInput');

// Route::post('/scanner', 'PresenceController@checkInput');


// Route::get('/scanner2', 'TempController@checkInput');


// Route::post('/scanner2', 'TempController@checkInput');


