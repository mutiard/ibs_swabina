<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schclass extends Model
{
    protected $table = 'schclass';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'kode',
        'deskripsi',
        'stime',
        'etime',
        'entry_user',
        'entry_date',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
