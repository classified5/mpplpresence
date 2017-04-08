<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengambil extends Model
{
    //
    protected $table = 'Mengambil';
    public $incrementing = false;

  	protected $fillable = [
  		'id_user',
  		'id_kelas',
  		'minggu',
  		'status_absen'
  		
  	];
}
