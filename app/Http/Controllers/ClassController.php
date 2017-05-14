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
	 	$class = DB::select(DB::raw("SELECT * FROM mengajar m, mata_kuliah mk WHERE m.kode=mk.kode and m.id_user='".Auth::user()->id_user."' GROUP BY m.kode"));
	 	// dd($table);
	 	//$class = Matakuliah::all();
	 	$this->data['class']=$class;
	 	$this->data['id']=$id;
	 	// $this->data['table']=$table;
	 	return view('pilih_kelas', $this->data );

	 } 

}
