<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_pengajuan_izin_history extends Model
{
    protected $table = 'tbl_pengajuan_izin_history';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'id_karyawan',
        'tgl_pengajuan',
        'tgl',
        'tgl_batas',
        'kategori',
        'keterangan',
        'acc',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
