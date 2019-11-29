<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schnikdetail extends Model
{
    protected $table = 'schnikdetail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'users_id',
        'sdate',
        'stime',
        'edate',
        'etime',
        'polaid',
        'entry_user',
        'entry_date',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
