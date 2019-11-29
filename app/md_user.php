<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class md_user extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id';
	public $timestamps = false;
	public $incrementing = true;
	protected $fillable = [
		'group_id','iskaryawan','username','email','nama','no_ktp','alamat','agama','tempat_lahir','tanggal_lahir','jenis_kelamin','status_menikah','pin_absensi','foto','jabatan_id','groupshift_id','groupkpi_id','struktur_kerja','ptkp_id','status','auth_key','password_hash','password_reset_token','created_at','created_by','updated_at','updated_by','deleted_at','deleted_by','md_client_id','tinggi_badan','berat_badan','ukuran_baju','ukuran_sepatu','ukuran_celana','status_apd'
	];

	public function karyawan_sp() {
		$time = Carbon::now();
		$time_array = explode(' ', $time);
		$now_date = $time_array[0];
		$karyawan_sp = DB::select('select tsp.jenis_sp from tbl_sanksi_pegawai as tsp, user u 
			where tsp.id_karyawan = "'.$this->id.'" 
			and "'.$now_date.'" between tsp.tanggal_mulai and tsp.tanggal_selesai');
		foreach ($karyawan_sp as $value) {
			return $value->jenis_sp;
		}
		return null;
	}
}
