<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_site extends Model
{
    protected $table = 'st_site';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'email',
        'no_telp',
        'alamat',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
