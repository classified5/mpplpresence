<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'Mata_Kuliah';
    protected $primaryKey = 'kode_matkul';
    public $incrementing = false;

  	protected $fillable = [
  		'kode_matkul',
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
}
