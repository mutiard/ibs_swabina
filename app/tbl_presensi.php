<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_presensi extends Model
{
    protected $table = 'tbl_presensi';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'kode_group',
        'kode_shift',
        'tgl_masuk',
        'jam_masuk',
        'tgl_jadwal',
        'jam_jadwal',
        'tgl_pulang',
        'jam_pulang',
        'tgl_jadwal_pulang',
        'jam_jadwal_pulang',
        'shift_jadwal',
        'group_jadwal',
        'ket_masuk',
        'entry_user',
        'entry_date',
        'id_number',
        'kode_dept',
        'mnt_terlambat',
        'mnt_plgsmtra',
        'mnt_plgcpt'
    ];
}
