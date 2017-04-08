<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
   	protected $table = 'Mengajar';
   	protected $primaryKey = 'id_mengajar'
    public $incrementing = true;

  	protected $fillable = [
  		'id_user',
  		'kode',
  		'tanggal',
  		'jam_masuk',
  		'jam_keluar',
  		'deskripsi_perkuliahan'
  		
  	];
}
