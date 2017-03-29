<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Schedule extends Model
{
    //
    use SoftDeletes;
    protected $table = "DETAIL_SCHEDULE";
    protected $primaryKey = "ID_DETAIL_SCHEDULE";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'ID_SCHEDULE',
        'ID_ROOM',
        'START_HOUR',
        'END_HOUR',
        'KELAS_DATE',
        'IS_ACTIVE',
    ];

    public function room()
    {
    	# code...
    }

    public function schedule()
    {
    	# code...
    }


    public function presence()
    {
    	# code...
    }
}
