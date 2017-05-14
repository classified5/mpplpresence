<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use Redirect;
use App\User;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    //
	public function loginValidation(){

		$user = Input::get('username');
		$pass = Input::get('password');
		
		$admin = User::where('id_user', $user)->first();
		
		if($admin->password == $pass){
				
				$temp = Auth::loginUsingId($admin->id_user);
				
				return Redirect::to('/');
		}else{
			return Redirect::to('/login');
		}



	}

	public function logout(){
		Auth::logout();
        return Redirect::to('/login');
	}

	public function home(){
		// dd(Auth::user()->id_role);
		if(Auth::check()){
			$this->get_start_weeks();
			if(Auth::user()->id_role == 3){
				$notif= DB::select(DB::raw("Select count(m.status_absen) as jumlah, m.kode, mk.nama_matkul from mengambil m, mata_kuliah mk where m.id_user='".Auth::user()->id_user."' and m.status_absen=2 and m.kode=mk.kode group by m.id_user, m.kode"));
				$count=0;
				// dd($notif);
				foreach ($notif as $key => $value) {
					// 
					if ($value->jumlah>=3) {
						$status[$count]=[(object)array('jumlah' => $value->jumlah, 'kode' => $value->kode, 'nama_matkul' => $value->nama_matkul)];
						$count+=1;
						// dd($status);
					}
						
				}
			}
			if (isset($status)) {
				$this->data['status']=$status;
				return view('home', $this->data);
			}
			else
				return view('home');
		}
		return redirect('/login');
	}

	public function get_start_weeks(){
		$tanggal_awal_raw =DB::table('tanggal_mulai')->orderBy('id_mulai','desc')->first();
		$tanggal_awal = $tanggal_awal_raw->minggu_pertama;
        $tanggal_akhir = date('Y-m-d');
        $detik = 24 * 3600;
        $tgl_awal = strtotime($tanggal_awal);
        $tgl_akhir = strtotime($tanggal_akhir);

        $minggu = 0;
        for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik)
        {
            if (date('w', $i) == '0'){
                $minggu++;
            }
        }
        session(['minggu'=>$minggu]);
    }

    public function get_profil(){
    	$tabel = DB::select( DB::raw("SELECT * FROM user where id_user='".Auth::user()->id_user."'"));
    	$this->data['user']=$tabel;
    	if (Auth::user()->id_role==3) {
    		$tabel = DB::select( DB::raw("SELECT mk.* from mata_kuliah mk, mengambil m WHERE id_user='".Auth::user()->id_user."' GROUP BY mk.kode"));
    		$this->data['mata_kuliah']=$tabel;
    		// dd('aa');
    	}
    	else if (Auth::user()->id_role==2) {
    		$tabel = DB::select( DB::raw("SELECT mk.* from mata_kuliah mk, mengajar m WHERE id_user='".Auth::user()->id_user."' GROUP BY mk.kode "));
    		$this->data['mata_kuliah']=$tabel;
    	}
    	return view('profil', $this->data);
    }
}
