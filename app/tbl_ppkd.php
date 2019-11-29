<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_ppkd extends Model
{
    protected $table = 'tbl_ppkd';
    protected $primaryKey = 'id';
    protected $fk1 = 'karyawan_id';
    protected $fk2 = 'kendaraan_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'karyawan_id',
        'waktu_awal',
        'waktu_akhir',
        'waktu_tbl_ppkd',
        'keterangan',
        'status',
        'kendaraan_id',
        'notes',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    public function md_kendaraan(){
      return $this->hasMany('App\md_kendaraan', $this->fk2);
    }

    public function md_karyawan(){
      return $this->hasMany('App\md_karyawan', $this->fk1);
    }
}
