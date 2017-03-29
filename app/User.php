<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $table = "USER";
    protected $primaryKey = "ID_USER";
    public $incrementing = false;
    public $timestamps = false;
    protected $SoftDelete = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array


     */

    protected $dates = ['delete_at'];

    protected $fillable = [
        'NAMA',
        'ALAMAT',
        'PASSWORD',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD', 'REMEMBER_TOKEN',
    ];

    public function role()
    {
        $this->belongsTo('app\Role');
    }

    public function user_class()
    {
        $this->hasMany('app\User_Class');
    }

    public function presence()
    {
        $this->hasMany('app\Presence');
    }

}
