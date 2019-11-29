<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Kemampuan extends Model
{
  protected $table = 'st_kemampuan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','tingkat'];  
}