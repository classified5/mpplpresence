<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggalmulai extends Model
{
    protected $table = 'tanggal_mulai';
    protected $primaryKey = 'id_mulai';
    public $incrementing = true;
    public $timestamps = false;

  	protected $fillable = [
      'id_mulai',
  		'minggu_pertama'
  	];

}
