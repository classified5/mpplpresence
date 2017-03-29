<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'Kelas';
    protected $primaryKey = 'id_admin';
    public $incrementing = true;

  	protected $fillable = [
  		'id_admin',
  		'nama_kelas',
  	];
}
