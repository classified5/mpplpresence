<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Mengambil;
use App\User;
use App\Matakuliah;
use App\Http\Requests;

class PresenceController extends Controller
{
    //
    public function getPresence(){

    	$idkelas = Input::get('idkelas');
    
    	
    	for($i = 1; $i <= 16; $i++){
    		$matakuliah[$i] = DB::select(DB::raw("SELECT m.minggu, m.id_user, m.kode, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, user u, mata_kuliah mk where u.id_user = m.id_user and m.kode = mk.kode and m.kode = '".$idkelas."' and m.minggu = '".$i."'"));
    	}
    
    	
    	$nama = $matakuliah[1][0]->nama_matkul;
    	
    	for($i=1; $i<=16;$i++){
    		$y = 1;
    		$graphpresence[$i] = 0;
    		$graphabsent[$i] = 0;
    		
    		foreach ($matakuliah[$i] as $key) {
    			$temp[$y][0] = $key->id_user;
    			$temp[$y][1] = $key->nama;
    			$temp[$y][$i+1] = $key->status_absen;
    			$y++;
    			
    		}
    		
    		
    		
    	}
    	
    	

    	$presence = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'presence', m.minggu, mk.nama_matkul FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$idkelas."' and m.status_absen = 1 GROUP BY m.minggu"));

    	$absent = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'absent', m.minggu, mk.nama_matkul FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$idkelas."' and m.status_absen != 1 GROUP BY m.minggu"));

    	//dd($presence, $absent);

    	
    	foreach ($presence as $key) {
	    	//dd($key->minggu);
	    	$graphpresence[$key->minggu] = $key->presence;

	    }

	    foreach ($absent as $key) {
	    	$graphabsent[$key->minggu] = $key->absent;
	    }	
    	
	    	
    	
    	//dd($graphabsent, $graphpresence);
    	

    	

    	return view('report_presence', ['nama' => $nama, 'temp' => $temp, 'presence' => $graphpresence, 'absent' => $graphabsent] );
    }

    public function getRekap(){

    	$kelas = Matakuliah::select('kode')->get();
    	// dd(count($kelas));

    	for($y=0;$y<count($kelas);$y++){
	    	for($i=1; $i<=16;$i++){
	    		
	    		$presence[$y][$i] = 0;
	    		$absent[$y][$i] = 0;
	  
	    	}
	    }	
	   
    	$c = 0;
    	foreach ($kelas as $key) {
    		
    		$presence[$c] = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'presence', m.minggu, mk.nama_matkul, m.kode FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$kelas[$c]->kode."' and m.status_absen = 1 GROUP BY m.minggu"));

    		$absent[$c] = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'absent', m.minggu, mk.nama_matkul FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$kelas[$c]->kode."' and m.status_absen != 1 GROUP BY m.minggu"));
    		$c++;
    	}
    	// dd($presence, $absent);
    	

    	// dd($presence[0]->nama_matkul, $absent);
    	// $nama = $presence[0]->nama_matkul;
    	// $kode = $presence[0]->kode;
    	
    	// foreach ($presence as $key) {
	    // 	//dd($key->minggu);
	    // 	$graphpresence[$key->minggu] = $key->presence;

	    // }

	    // foreach ($absent as $key) {
	    // 	$graphabsent[$key->minggu] = $key->absent;
	    // }	
    	// dd($graphpresence, $graphabsent);

    	return view('rekap', [ 'presence' => $presence, 'absent' => $absent] );
    }
}
