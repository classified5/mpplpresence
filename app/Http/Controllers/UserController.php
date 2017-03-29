<?php

namespace App\Http\Controllers;



use DB;
use Auth;
use Redirect;
use App\User;
use App\Kelas;
use App\User_Class;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;


class UserController extends Controller
{
    public function index()
    {
    	# code...

        $user = DB::table('USER')
                ->join('ROLE', function ($join){
                    $join->on('USER.ID_ROLE', '=', 'ROLE.ID_ROLE');
                })->get();

        

        return view('user')->with('user', $user);


    }

    public function create()
    {
    	# code...
    }

    public function edit()
    {
    	# code...
    }

    public function delete()
    {
    	# code...
    }

    public function setRole()
    {
    	# code...
    }

    public function login()
    {
    	# code...

        $user = Input::get('username');
        $pass = Input::get('password');
       
        $login = User::where('ID_USER', $user)->first();

        //dd($login);
        if($login){
            if($login->PASSWORD == $pass){
                $temp = Auth::loginUsingId($login->ID_USER);

                return Redirect::to('/');
            }
            else{
                return Redirect::to('/login');
            }
        }
        else{
            
            return Redirect::to('/login');
        }


    }

    public function logout()
    {
    	Auth::logout();
        return Redirect::to('/login');
    }

}
