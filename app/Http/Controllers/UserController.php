<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Db;
use Auth;
use Redirect;
use App\User;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    //
	public function LoginValidation(){

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

}
