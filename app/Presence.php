<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{
    //
    use SoftDeletes;
    protected $table = "PRESENCE";
    protected $primaryKey = "ID_PRESENCE";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;



    protected $fillable = [
        'ID_USER',
        'ID_TYPE',
        'ID_DETAIL_SCHEDULE',
    ];

    public function user()
    {
        $this->belongsTo('app\User');
    }

    public function type_presence()
    {
        $this->belongsTo('app\Type_Presence');
    }

    public function detail_schedule()
    {
        # code...
    }
}
