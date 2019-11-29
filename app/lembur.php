<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lembur extends Model
{
    protected $table = 'lembur';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'karyawan_id',
        'waktu_awal',
        'waktu_akhir',
        'waktu_lembur',
        'keterangan',
        'status',
        'notes',
        'acc',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
