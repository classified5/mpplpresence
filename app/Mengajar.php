<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
   	protected $table = 'Mengajar';
   	protected $primaryKey = 'id_mengajar'
    public $incrementing = true;
    public $timestamps = false;

  	protected $fillable = [
  		'id_user',
  		'kode',
  		'tanggal',
  		'jam_masuk',
  		'jam_keluar',
  		'deskripsi_perkuliahan'
  		
  	];

  	public function user(){
  		return $this->belongsTo('User');
  	}

  	public function matakuliah(){
  		return $this->belongsTo('Matakuliah');
  	}


}
