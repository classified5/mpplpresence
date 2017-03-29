<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Db;
use Auth;
use Redirect;
use App\Admin;
use App\Dosen;
use App\Mahasiswa;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    //
	public function LoginValidation(){

		$user = Input::get('username');
		$pass = Input::get('password');

		$admin = Admin::where('username_admin', $user)->first();
		$flag = 1;
		if(is_null($admin)){
			$dosen = Dosen::where('NIP', $user)->first();
			$flag = 2;
			if(is_null($dosen)){
				$mahasiswa = Mahasiswa::where('NRP', $user)->first();
				$flag = 3;
				if(is_null($mahasiswa)){
					return Redirect::to('/login');
				}
			}
		}
		
		if($flag == 1){
			if($admin->pass_admin == $pass){
				//dd($admin->username_admin);
				$temp = Auth::loginUsingId($admin->id_admin);
				//dd($temp);
				return Redirect::to('/');
			}else{
				return Redirect::to('/login');
			}
		}
		else if($flag == 2){
			if($dosen->pass_dosen == $pass){
				$temp = Auth::loginUsingId($dosen->NIP);

				return Redirect::to('/');
			}else{
				return Redirect::to('/login');
			}
		}
		else if($flag == 3){
			if($mahasiswa->pass_mhs == $pass){
				$temp = Auth::loginUsingId($mahasiswa->NRP);

				return Redirect::to('/');
			}else{
				return Redirect::to('/login');
			}
		}



	}

}
