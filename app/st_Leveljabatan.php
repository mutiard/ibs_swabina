<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Leveljabatan extends Model
{
  protected $table = 'st_leveljabatan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','jabatan'];  
}