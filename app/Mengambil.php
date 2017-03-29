<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengambil extends Model
{
    //
    protected $table = 'Mengambil';
    public $incrementing = false;

  	protected $fillable = [
  		'NRP',
  		'kode_matkul',
  		'minggu',
  		'status_absen'
  		
  	];
}
