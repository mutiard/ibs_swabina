<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Bahasa extends Model
{
  protected $table = 'st_bahasa';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','deskripsi'];
  
}
