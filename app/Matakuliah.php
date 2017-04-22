<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'Mata_Kuliah';
    protected $primaryKey = 'kode_matkul';
    public $incrementing = false;
    public $timestamps = false;

  	protected $fillable = [
  		'kode',
  		'id_kelas',
  		'nama_matkul',
  		'waktu_mulai_kuliah',
  		'waktu_selesai_kuliah',
      'hari',
      'semester'
  	];

    public function user(){
      return $this->belongsTo('Kelas');
    }

    public function matkulmengambil(){
      return $this->hasMany('Mengambil');
    }
    public function matkulmengajar(){
      return $this->hasMany('Mengajar');
    }
}
