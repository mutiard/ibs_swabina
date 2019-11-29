<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schpola_dtl extends Model
{
    protected $table = 'schpola_dtl';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'polaid',
        'hari_ke',
        'schclass_id',
        'entry_user',
        'entry_date',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
}
