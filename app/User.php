<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    //
    protected $table = 'User';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    public $timestamps = false;

  	protected $fillable = [
  		'id_user',
  		'id_role',
  		'nama',
  		'password',
  		
  	];

  	public function userrole(){
  		return $this->belongsTo('User');
  	}

  	public function usermengajar(){
  		return $this->hasMany('Mengajar');
  	}

  	public function usermengambil(){
  		return $this->hasMany('Mengambil');
  	}
}
