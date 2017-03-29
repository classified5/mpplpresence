<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    //
    use SoftDeletes;
    protected $table = "ROOM";
    protected $primaryKey = "ID_ROOM";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'ID_ROOM',
        'ID_SCANNER',
        'NAMA_ROOM',
    ];

    public function scanner()
    {
        // coode
    }
}
