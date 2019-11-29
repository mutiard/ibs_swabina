<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_datakeluarga extends Model
{
    protected $table = 'st_jobseeker_datakeluarga';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
      'id','user_id','nama_anggota_keluarga','hubungan_keluarga','jenis_kelamin','tempat_lahir','tanggal_lahir','bekerja'
      ];
  
    public function user_id(){
      return $this->hasOne('App\md_jobseeker','id','users_id');
    }

     protected static function boot(){
      parent::boot();
      static::creating(function ($model) {
          try {
              $model->id = Uuid::uuid4()->toString();
          } catch (UnsatisfiedDependencyException $e) {
              abort(500, $e->getMessage());
          }
      });
    }
    
}
