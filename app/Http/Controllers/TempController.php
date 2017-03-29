<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Http\Requests;
use Request;

use App\User;
use App\Kelas;
use App\User_Class;
use App\Presence;

class TempController extends Controller
{
    //

    public function checkPresence(){

        $temp = DB::table('Presence')
                ->crossJoin('Detail_Schedule')
                ->crossJoin('Schedule')
                ->crossJoin('Kelas')
                ->crossJoin('User')
                ->where('Presence.ID_USER', '=', $user_id)
                ->get();

        $temp['presence'] = DB::select("select from Presence P, Schedule S, Detail_Schedule D, User U, Kelas K 
                              where P.ID_DETAIL_SCHEDULE = D.ID_DETAIL_SCHEDULE and D.ID_SCHEDULE = S.ID_SCHEDULE and S.ID_KELAS = K.ID_KELAS and P.ID_USER = U.ID_USER and U.ID_USER = '$user_id'");







    }

    public function checkInput(){


        // $user_id = Input::get('iduser');
        // $user_class = Input::get('class');
        
        // $user = DB::table('USER')->where('ID_USER', $user_id)->first();
        
       
        // if($user){
        //     $this->isEligible($user_id, $user_class);
        // }
        // else{
        //     return Redirect::to('/scanner');
        // }

        if (Request::isMethod('get')) {
        	$data = array();
        	$data['kelas'] = Kelas::orderBy('NAMA_KELAS')->get();
        	$data['student'] = User::where('ID_ROLE',1)->orderBy('ID_USER')->get();
        	$data['lecturer'] = User::where('ID_ROLE',2)->orderBy('ID_USER')->get();
        	
        	return view('scanner', $data);
        }
        elseif (Request::isMethod('post')) {
        	$user_id = Input::get('ID_USER');
            $user_class = Input::get('ID_KELAS');
        //dd($user_class, $user_id);
            $user = DB::table('USER')->where('ID_USER', $user_id)->first();
            
            
            if($user){
                if ($this->isEligible($user_id, $user_class)) {
                	$presence = new Presence;
                	$presence->ID_USER = $user_id;
                	$presence->ID_TYPE = 1;
                	$presence->ID_DETAIL_SCHEDULE = 1;
                	$presence->save();
                }

            }
            else{
                return Redirect::to('/scanner2');
            }
        }
        else {
        	echo "error";
        }



    }

    public function isEligible($user_id, $user_class){
    	$eli = User_Class::where('ID_USER',$user_id)->where('ID_KELAS',$user_class)->get();
    	return is_null($eli) ? 1 : 0;
    }





}
