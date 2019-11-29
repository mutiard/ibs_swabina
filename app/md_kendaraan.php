<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class md_kendaraan extends Model
{
    protected $table = 'md_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_kendaraan',
        'jenis_kendaraan',
        'merk',
        'plat'
    ];
}
