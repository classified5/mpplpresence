<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scanner extends Model
{
    //
    use SoftDeletes;
    protected $table = "SCANNER";
    protected $primaryKey = "ID_SCANNER";
    public $incrementing = true;
    public $timestamps = true;
    protected $SoftDelete = true;

    protected $dates = ['delete_at'];

    protected $fillable = [
    	'ID_SCANNER',
        'NAMA_SCANNER',
    ];

    public function room()
    {
        // 
    }
}
