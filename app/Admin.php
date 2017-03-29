<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'Admin';
    protected $primaryKey = 'id_admin';
    public $incrementing = true;

  	protected $fillable = [
  		'username_admin',
  		'nama_admin',
  		'pass_admin'
  	];

  	
}
