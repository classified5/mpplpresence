<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Http\Requests;

class AccountController extends Controller
{
    public function CreateAccount(){
    	$id = Input::get('id');
    	$nama = Input::get('nama');
    	$password = Input::get('password');
    	$role = Input::get('role');
    	$tabel = DB::insert( DB::raw("INSERT INTO user
    						 VALUES ('".$id."','".$role."','".$nama."','".$password."')"));
     //    if ($flag==1)
     //    	return redirect('/adduser');
    	// else 
    	return redirect('/account-manager');
    }

    public function DeleteAccount(){
    	$id_user = Input::get('id_user');
        $tabel = DB::delete( DB::raw("DELETE FROM user WHERE id_user='".$id_user."'"));
    	return redirect('/account-manager');
    }

    public function EditAccount(){
    	$id_user = Input::get('id_user');
    	$tabel = DB::select( DB::raw("SELECT * FROM user WHERE id_user='".$id_user."'"));
    	$this->data['user']=$tabel;
    	// dd("SELECT * FROM user WHERE id_user='".$id_user."'");
    	return view('edituser', $this->data);
    }

    public function ListAccount(){
    	$tabel = DB::select( DB::raw("SELECT * FROM user "));
        $this->data['user']=$tabel;
    	return view('account_manager', $this->data);
    }

    public function EditAccountYes(){
    	$id_temp = Input::get('id_user');
    	$id = Input::get('id');
    	$nama = Input::get('nama');
    	$password = Input::get('password');
    	$role = Input::get('role');
    	$tabel = DB::update( DB::raw("UPDATE user set id_user='".$id."', 
    		id_role='".$role."', nama='".$nama."', password='".$password."' WHERE id_user='".$id_temp."'"));
    	return redirect('account-manager');
    }
}
