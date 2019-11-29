<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_permintaan_tenaga_kerja extends Model
{
	protected $table = 'tbl_permintaan_tenaga_kerja';
	protected $primaryKey = 'id_permintaan';
	public $timestamps = false;
	public $incrementing = false;

	protected $fillable = [
		'id_permintaan','tanggal_permintaan','tanggal_dibutuhkan','jumlah_tenaga_kerja','jabatan','status_tambahan','status_tetap','status_pria','status_jam_kerja_biasa_pria','status_malam_pria','status_penggantian','status_sementara','status_wanita','status_jam_kerja_biasa_wanita','status_malam_wanita','status_min','status_max','status_khusus','status_sltp','status_slta','status_akademis','status_sarjana','waktu_sementara','nama_pengganti','alasan_tambahan_penggantian','syarat_pendidikan_khusus','syarat_lain','alasan_cocok','catatan','diminta_oleh','diketahui_oleh','disetujui_oleh'
	];

}
