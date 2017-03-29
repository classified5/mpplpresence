<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User_Class extends Model
{
    use SoftDeletes;
    //
    protected $table = "USER_CLASS";
    protected $primaryKey = "ID_UC";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['deleted_at'];

    



    protected $fillable = [
        'ID_UC',
        'ID_USER',
        'ID_KELAS',
    ];


    public function user()
    {
        return $this->belongsTo('app\User');
    }

    public function class_detail()
    {
        return $this->belongsTo('app\Kelas');
    }




}
