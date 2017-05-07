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
			return view('home');
		}
		return redirect('/login');
	}

	public function get_start_weeks(){
		$tanggal_awal_raw =DB::table('tanggal_mulai')->orderBy('id_mulai','desc')->first();
		$tanggal_awal = $tanggal_awal_raw->minggu_pertama;
        $tanggal_akhir = '2017-04-30';
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
}
