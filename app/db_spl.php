<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class db_spl extends Model
{
    protected $table = 'db_spl';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id','id_karyawan','lembur_mulai','lembur_selesai','ket','jadwal'
    ];
}
