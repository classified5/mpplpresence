<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\Mengambil;
use App\User;

use App\Matakuliah;

use App\Mengajar;

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

    public function detailRekap(){

    	$idkelas = Input::get('idkelas');
    	// dd($idkelas);
    	
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
    	
    	

    	// $presence = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'presence', m.minggu, mk.nama_matkul FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$idkelas."' and m.status_absen = 1 GROUP BY m.minggu"));

    	// $absent = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'absent', m.minggu, mk.nama_matkul FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$idkelas."' and m.status_absen != 1 GROUP BY m.minggu"));

    	$presence = DB::select(DB::raw("SELECT COUNT(id_user) as presence, id_user FROM mengambil where kode = '".$idkelas."' and status_absen = 1 GROUP by id_user"));

    	$count = DB::select(DB::raw("SELECT COUNT(id_user) as count, id_user FROM mengambil where kode = '".$idkelas."' GROUP by id_user"));
    	// dd($temp, $presence, $count);
    	return view('detail_rekap', ['presence' => $presence, 'nama' => $nama, 'temp' => $temp, 'count' => $count ] );

    }

    public function getRekap(){

    	$kelas = Matakuliah::select('kode')->get();
    	// dd(count($kelas));

    	
    	$c = 0;
    	foreach ($kelas as $key) {
    		
    		$presence[$c] = DB::select(DB::raw("SELECT COUNT(m.status_absen) as 'presence', m.minggu, mk.nama_matkul, m.kode FROM mengambil m, mata_kuliah mk WHERE m.kode = mk.kode and m.kode = '".$kelas[$c]->kode."' and m.status_absen = 1 GROUP BY m.minggu"));

    	
    		$count[$c] = DB::select(DB::raw("SELECT COUNT(id_user) as 'count' FROM mengambil WHERE kode = '".$kelas[$c]->kode."' GROUP BY minggu"));
           
    		$c++;
    	}
    	// dd($presence, $count);
    	
    	for ($i=0; $i<count($presence); $i++){
    		for($y=0; $y<17; $y++){
    			if (empty($presence[$i][$y])) {
                // $presence[$i]=[(object)array('presence' => '0', 'kode' => '0', 'nama_matkul' => '0')];
            		$presence[$i][$y]=(object)array('presence' => '0');
            		$absent[$i][$y]=(object)array('absent' => '0');

            		
            	}else{
            		if($presence[$i][$y]->presence != $count[$i][$y]->count){
            			// dd($presence[$i][$y]->presence);
            			$temp = $count[$i][$y]->count-$presence[$i][$y]->presence;
            			
            			$absent[$i][$y]=(object)array('absent' => $temp);
            		}else{
            			$absent[$i][$y]=(object)array('absent' => '0');
            		}
            		
            	}

            	
    		}
    		 
    	}
    	// dd($presence,$absent);

    

    	return view('rekap', [ 'presence' => $presence, 'absent' => $absent] );


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

        $tabel = DB::select( DB::raw("SELECT id_mengajar FROM `mengajar` WHERE id_user='".Auth::user()->id_user."' and kode='".$mata_kuliah."' and minggu='".$minggu."' "));
        if ($tabel==null) 
            $tabel = DB::insert( DB::raw("INSERT INTO mengajar VALUES ('','".Auth::user()->id_user."','".$mata_kuliah."','".$tanggal."','".$jam_mulai."','".$jam_selesai."','".$deskripsi."','".$minggu."')"));
        else{
            // dd($tabel[0]->id_mengajar);
            $tabel = DB::update( DB::raw("UPDATE mengajar SET tanggal='".$tanggal."' , jam_masuk='".$jam_mulai."' , jam_keluar='".$jam_selesai."' , deskripsi_perkuliahan='".$deskripsi."' WHERE id_mengajar='".$tabel[0]->id_mengajar."'"));
        }
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

    public function presenceMahasiswa(){
    	// $nrp = '5114100001';
    	$nrp = Auth::id();
    	// dd($nrp);

    	$kelas = DB::select(Db::raw("SELECT m.kode, mk.nama_matkul FROM mengambil m, mata_kuliah mk where m.id_user = '".$nrp."' and m.kode = mk.kode  GROUP BY m.kode "));
    	

    	for ($i=0; $i < count($kelas) ; $i++) { 
    		$presence[$i] = DB::select(DB::raw("SELECT COUNT(status_absen) as 'presence' from mengambil where id_user = '".$nrp."' and status_absen = 1 and kode = '".$kelas[$i]->kode."'"));
    		$absent[$i] = DB::select(DB::raw("SELECT COUNT(status_absen) as 'absent' from mengambil where id_user = '".$nrp."' and status_absen != 1 and kode = '".$kelas[$i]->kode."'"));
    	}

    	// dd($kelas, $presence, $absent);
    	
    	return view('rekap_mahasiswa', [ 'presence' => $presence, 'absent' => $absent, 'kelas' => $kelas] );
    }

    public function detailPresenceMahasiswa(){
    	$nrp = Auth::user()->id_user;
    	$idkelas = Input::get('idkelas');

    	

    	for($i = 1; $i <= 16; $i++){	
    		$matakuliah[$i] = DB::select(DB::raw("SELECT m.minggu, m.id_user, m.kode, m.status_absen, mk.nama_matkul, u.nama FROM mengambil m, user u, mata_kuliah mk where u.id_user = m.id_user and m.kode = mk.kode and m.kode = '".$idkelas."' and m.minggu = '".$i."' and m.id_user = '".$nrp."'"));
    	}
    	for($i = 1; $i <= 18; $i++){
    		if(empty($matakuliah[$i])) {
    			$matakuliah[$i] = 0;
    		}
    	}
    	$nama = $matakuliah[1][0]->nama;

    	// dd($matakuliah);	
    	// dd($matakuliah[1][0]->id_user);

    	return view('detail_rekap_mahasiswa', ['matakuliah' => $matakuliah, 'nama' => $nama, 'nrp' => $nrp]);
    }
}
 
             