<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\User;
use App\Http\Requests;
use App\Matakuliah;

class ClassController extends Controller
{
    //
	public function getClass()
	 {
	 	$class = Matakuliah::all();

	 	return view('pilih_kelas', ['class' => $class] );

	 } 

}
