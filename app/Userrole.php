<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    //
    protected $table = 'User_Role';
    public $incrementing = true;

  	protected $fillable = [
  		'nama_role' 		
  	];

  	public function user(){
  		return $this->hasMany('User');
  	}
}
