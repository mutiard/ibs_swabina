<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Posisikerja extends Model
{
  protected $table = 'st_posisikerja';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','posisi'];  
}