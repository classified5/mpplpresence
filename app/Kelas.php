<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    //
    protected $table = 'KELAS';
    protected $primaryKey = 'ID_KELAS';
    public $incrementing = true;
    use SoftDeletes;

    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'NAMA_KELAS',
        'KODE_MK',
        'MAX',
        'COUNT',
        'TAHUN_AJARAN',
        'SEMESTER',
    ];

    public function class_detail()
    {
        $this->hasMany('app\User_Class');
    }

    public function schedule()
    {
        // code
    }
}
