<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
   	protected $table = 'Mengajar';
    public $incrementing = false;

  	protected $fillable = [
  		'id_user1',
  		'id_kelas',
  		'tanggal',
  		'jam_masuk',
  		'jam_keluar',
  		'deskripsi_perkuliahan'
  		
  	];
}
