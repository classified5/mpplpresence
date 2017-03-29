<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    use SoftDeletes;
    protected $table = "ROLE";
    protected $primaryKey = "ID_ROLE";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;
    protected $dates = ['delete_at'];



    protected $fillable = [
        'NAMA_ROLE',
        'DESC',
    ];


    public function user()
    {
        $this->hasMany('app\User');
    }
}
