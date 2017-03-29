<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $table = "SCHEDULE";
    protected $primaryKey = "ID_SCHEDULE";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'ID_SCHEDULE',
        'ID_KELAS',
        'ID_DOSEN',
        'ID_ASDOS'
    ];

    public function user($value='')
    {
    	# code...
    }

    public function detail_schedule($value='')
    {
    	# code...
    }

    public function kelas($value='')
    {
    	# code...
    }
}
