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

class PresenceController extends Controller
{
    //

    public function checkPresence(){
        $currentMax = DB::table('KELAS')->select( DB::raw('concat("TAHUN_AJARAN"::text, "SEMESTER"::text) as tahun'))->orderBy('tahun','desc')->value('tahun');

        $currentYear = substr($currentMax, 0,4);
        $currentSemester = substr($currentMax, 4,6);
        // dd($currentYear,$currentPeriod);

        $data['listKelas'] = DB::select( DB::raw('select "USER"."NAMA", "KELAS"."ID_KELAS","KELAS"."NAMA_KELAS", (select count(*) from "PRESENCE" where "ID_TYPE" = 1 and "ID_SCHEDULE" = "SCHEDULE"."ID_SCHEDULE") as present, (select count(*) from "PRESENCE" where "ID_TYPE" = 2 and "ID_SCHEDULE" = "SCHEDULE"."ID_SCHEDULE") as absent, (select count(*) from "PRESENCE" where "ID_TYPE" = 3 and "ID_SCHEDULE" = "SCHEDULE"."ID_SCHEDULE") as permit
from "USER_CLASS" 
inner join "KELAS" on "USER_CLASS"."ID_KELAS" = "KELAS"."ID_KELAS" 
INNER JOIN "SCHEDULE" on "KELAS"."ID_KELAS" = "SCHEDULE"."ID_KELAS"
inner JOIN "USER" on "USER"."ID_USER" ="SCHEDULE"."ID_DOSEN"
where "USER_CLASS"."ID_USER" = '."'5114100186'".' and "TAHUN_AJARAN" = '."'".$currentYear."'".' and "SEMESTER" = '."'".$currentSemester."'"));

        // dd($data['listKelas']);
        return view('presence', $data);




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
                if ($this->isEligible($user_id, $user_class)){
                    $presence = new Presence;
                    $presence->ID_USER = $user_id;
                    $presence->ID_TYPE = 1;
                    $presence->ID_DETAIL_SCHEDULE = 1;
                    $presence->save();

                    return redirect()->back()->with('success',['sukses']);
                }
                else {
                    return redirect()->back()->with('noteligible',['not eligible']);
                }

            }
            else{
                return redirect()->back()->with('notfound',['notfound']);
            }
        }
        else {
            echo "error";
        }
    }

    public function checkHistory($id)
    {
        $data['list'] = DB::select( DB::raw('select x.created_at, "PRESENCE"."ID_TYPE", ty."NAME_TYPE"
from "PRESENCE", (SELECT *
from "DETAIL_SCHEDULE"
where "ID_SCHEDULE" = (SELECT "ID_SCHEDULE"
from "SCHEDULE"
where "ID_KELAS" = '.$id.')) x,"TYPE_PRESENCE" ty
where "ID_USER" = '."'".Auth::id()."'".' and "PRESENCE"."ID_DETAIL_SCHEDULE" = x."ID_DETAIL_SCHEDULE" and ty."ID_TYPE" = "PRESENCE"."ID_TYPE";'));
        // dd($data);
        return view('history', $data);
    }

    public function isEligible($user_id, $user_class){
        $eli = User_Class::where('ID_USER',$user_id)->where('ID_KELAS',$user_class)->first();
        // dd($eli);
        return $eli ? 1 : 0;
        
    }





}
