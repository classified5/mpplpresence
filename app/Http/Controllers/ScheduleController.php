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

class ScheduleController extends Controller
{

    public function index()
    {
        $class = Kelas::get();

        return view('schedule')->with('class', $class);

    }

    public function edit()
    {
    	# code...
    }

    public function startClass()
    {
    	# code...
    }

    public function stopClass()
    {
    	# code...
    }

    public function isLecturer()
    {
    	# code...
    }

    public function defaultSchedule()
    {
    	# code...
    }

    public function generateSchedule()
    {
    	# code...
    }
}
