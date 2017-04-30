<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\Mengambil;
use App\User;
use App\Mengajar;
use App\Http\Requests;

class PresenceController extends Controller
{
    //
    public function getPresence(){

    	$idkelas = Input::get('idkelas');
    	//dd($idkelas);

    	// $matakuliah = DB::table('Mengambil')
    	// 				->join('User', function ($join){
    	// 					 $join->on('User.id_user', '=', 'Mengambil.id_user')
     //             				->where('Mengambil.kode', '=', 
     //             					'KI141301');
    	// 				})->get();

    	// $matakuliah = DB::select(DB::raw("SELECT COUNT(m.minggu) AS 'jumlahminggu', m.id_user, m.kode, m.minggu, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, mata_kuliah mk, user u where u.id_user = m.id_user and m.kode = mk.kode and mk.kode = '".$idkelas."'  GROUP BY m.id_user"));
    	// 
    	
    	for($i = 1; $i <= 16; $i++){
    		$matakuliah[$i] = DB::select(DB::raw("SELECT m.minggu, m.id_user, m.kode, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, user u, mata_kuliah mk where u.id_user = m.id_user and m.kode = mk.kode and m.kode = '".$idkelas."' and m.minggu = '".$i."'"));
    	}
    	// dd($matakuliah);
    	//$temp = array(array());
    	// $temp[0] = $matakuliah[1][0]->nama;
    	// dd($temp[0]);
    	// $temp[1][$1] = $matakuliah[$i][$i-1]->status_absen;
    	//dd($matakuliah[1]);
    	//
    	
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

    public function input_presence(){
        $this->data['idkelas']= Input::get('idkelas');
        return view('input_presence', $this->data);
    }

    public function detail_presence(){
        $jam_mulai= date('H:i:s', strtotime(Input::get('jam_mulai')));
        $jam_selesai= date('H:i:s', strtotime(Input::get('jam_selesai')));
        $tanggal= date('Y-m-d', strtotime(Input::get('tanggal')));
        $deskripsi= Input::get('deskripsi');
        $mata_kuliah= Input::get('mata_kuliah');
        $minggu= Input::get('minggu');
        // $tabel = DB::insert( DB::raw("INSERT INTO mengajar VALUES ('','".Auth::user()->id_user."','".$mata_kuliah."','".$tanggal."','".$jam_mulai."','".$jam_selesai."','".$deskripsi."')"));
        // dd(Auth::user()->id_user);

        $tabel = DB::select( DB::raw("SELECT m.*, u.nama FROM mengambil m, user u WHERE m.kode='".$mata_kuliah."' and m.minggu='".$minggu."' and u.id_user=m.id_user"));
        $this->data['user']=$tabel;
        $this->data['minggu']=$minggu;
        // dd($tabel);

        return view('detail_presence', $this->data);
    }

    public function submit_presence(){
        $count= Input::get('count');
        for ($i=1; $i <=$count ; $i++) { 
            $id_mengambil= Input::get('id_mengambil'.$i.'');
            $status_absen= Input::get('status'.$i.'');
            $tabel = DB::update( DB::raw("UPDATE mengambil set status_absen='".$status_absen."' WHERE id_mengambil='".$id_mengambil."'"));
        }
        
        $mata_kuliah= Input::get('mata_kuliah');
        $minggu= Input::get('minggu');
        $tabel = DB::select( DB::raw("SELECT m.*, u.nama FROM mengambil m, user u WHERE m.kode='".$mata_kuliah."' and m.minggu='".$minggu."' and u.id_user=m.id_user"));
        $this->data['user']=$tabel;
        $this->data['minggu']=$minggu;
        $this->data['success']=true;
        \Session::flash('info','Success');
        return view('detail_presence', $this->data);
    }
}
