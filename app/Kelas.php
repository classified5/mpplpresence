<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'Kelas';
    protected $primaryKey = 'id_kelas';
    public $incrementing = true;
    public $timestamps = false;

  	protected $fillable = [
  		'nama_kelas',
  	];

  	public function user(){
  		return $this->hasMany('Matakuliah');
  	}
}
