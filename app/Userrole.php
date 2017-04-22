<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    //
    protected $table = 'User_Role';
    protected $primaryKey = 'id_role';
    public $incrementing = true;
    public $timestamps = false;

  	protected $fillable = [
  		'nama_role' 		
  	];

  	public function user(){
  		return $this->hasMany('User');
  	}
}
