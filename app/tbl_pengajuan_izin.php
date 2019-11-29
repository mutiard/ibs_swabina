<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_pengajuan_izin extends Model
{
    protected $table = 'tbl_pengajuan_izin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'id_karyawan',
        'tgl_pengajuan',
        'tgl_mulai',
        'tgl_batas',
        'tgl_selesai',
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
