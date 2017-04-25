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
    	return redirect('/adduser');
    }

    public function DeleteAccount(){
    	return view('deleteuser');
    }

    public function EditAccount(){
    	return view('edituser');
    }

    public function ListAccount(){
    	$tabel = DB::select( DB::raw("SELECT * FROM user "));
        $this->data['user']=$tabel;
    	return view('account_manager', $this->data);
    }
}
