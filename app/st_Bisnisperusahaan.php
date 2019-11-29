<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Bisnisperusahaan extends Model
{
  protected $table = 'st_bisnisperusahaan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','name'];
  
}
