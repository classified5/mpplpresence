<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
    protected $table = 'Dosen';
    protected $primaryKey = 'NIP';
    public $incrementing = false;

  	protected $fillable = [
  		'NIP',
  		'nama_dosen',
  		'pass_dosen'
  	];
}
