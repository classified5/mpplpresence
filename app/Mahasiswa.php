<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'Mahasiswa';
    protected $primaryKey = 'NRP';
    

  	protected $fillable = [
  		'NRP',
  		'nama_mhs',
  		'pass_mhs'
  	];
}
