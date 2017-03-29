<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
   	protected $table = 'Mengajar';
    public $incrementing = false;

  	protected $fillable = [
  		'NIP',
  		'kode_matkul',
  		
  	];
}
