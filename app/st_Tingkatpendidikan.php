<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Tingkatpendidikan extends Model
{
  protected $table = 'st_tingkatpendidikan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','strata'];
  
}
