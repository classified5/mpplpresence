<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Mengambil;
use App\User;
use App\Http\Requests;

class PresenceController extends Controller
{
    //
    public function GetPresence(){

    	$idkelas = Input::get('idkelas');
    	//dd($idkelas);

    	// $matakuliah = DB::table('Mengambil')
    	// 				->join('User', function ($join){
    	// 					 $join->on('User.id_user', '=', 'Mengambil.id_user')
     //             				->where('Mengambil.kode', '=', 
     //             					'KI141301');
    	// 				})->get();

    	$matakuliah = DB::select(DB::raw("SELECT COUNT(m.minggu) AS 'jumlahminggu', m.id_user, m.kode, m.minggu, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, mata_kuliah mk, user u where u.id_user = m.id_user and m.kode = mk.kode and mk.kode = '".$idkelas."'  GROUP BY m.id_user"));

    	// $matakuliah = DB::select(DB:raw("SELECT COUNT(m.minggu) AS 'jumlahminggu', m.id_user, m.kode, m.minggu, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, mata_kuliah mk, user u where u.id_user = m.id_user and m.kode = mk.kode and mk.kode = '".$idkelas."' GROUP BY m.id_user " ));


    	//dd($matakuliah);
    	return view('report_presence', ['matakuliah' => $matakuliah] );
    }
}
