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
	public function getClass($id)
	 {
	 	$class = Matakuliah::all();
	 	$this->data['class']=$class;
	 	$this->data['id']=$id;
	 	return view('pilih_kelas', $this->data );

	 } 

}
