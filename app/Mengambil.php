<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengambil extends Model
{
    //
    protected $table = 'Mengambil';
    protected $primaryKey = 'id_mengambil';
    public $incrementing = true;
    public $timestamps = false;

  	protected $fillable = [
      'id_user',
  		'kode',
  		'minggu',
  		'status_absen'
  		
  	];

    public function user(){
      return $this->belongsTo('User');
    }

    public function matakuliah(){
      return $this->belongsTo('Matakuliah');
    }

}
