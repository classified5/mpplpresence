<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_Presence extends Model
{
    //

    use SoftDeletes;
    protected $table = "TYPE_PRESENCE";
    protected $primaryKey = "ID_TYPE";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;
    protected $dates = ['delete_at'];

    protected $fillable = [
        'NAME_TYPE',
        'DESC',
    ];

    public function presence()
    {
        $this->hasMany('app\Presence');
    }
}
