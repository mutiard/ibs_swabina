<?php

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('requestpekerjaan', function () {
    return view('request_pekerjaan');
});

//PENILAIAN PEGAWAI
Route::get('penilaian_datakaryawan', 'PenilaianController@data_karyawan')->name('penilaian_datakaryawan');
Route::get('periode_penilaian', 'PenilaianController@periode_penilaian');
Route::get('histori_penilaian', 'PenilaianController@histori_penilaian');
Route::get('tambah_nilai/{id}', 'PenilaianController@create_penilaian');
Route::get('detail_nilai/{id}', 'PenilaianController@detail_penilaian');
Route::post('pegawai/datanilai', 'PenilaianController@getDataPenilaian');
Route::post('store_penilaian_pegawai/{id}', 'PenilaianController@store_penilaian');
Route::post('periode_penilaian/store', 'PenilaianController@store_periode_penilaian');
Route::get('periode_penilaian/aktif/{id}', 'PenilaianController@statusActive');
Route::get('periode_penilaian/nonaktif/{id}', 'PenilaianController@statusNotActive');
Route::get('data_sanksi_pegawai', 'PenilaianController@data_sanksi_pegawai')->name('data_sanksi_pegawai');
Route::get('tambah_sanksi_pegawai', 'PenilaianController@create_sanksi_pegawai');
Route::post('store_sanksi_pegawai', 'PenilaianController@store_sanksi_pegawai');

//APD
Route::get('datakaryawan', 'HomeController@data_karyawan');
Route::get('editkaryawan/{id}', 'HomeController@edit_karyawan');
Route::match(['put','patch'],'updatekaryawan/{id}', 'HomeController@update_karyawan');
Route::get('pengajuanapd/{id}','HomeController@pengajuanAPD');
Route::get('tolakpengajuanapd/{id}','HomeController@tolakPengajuanAPD');
Route::get('terimapengajuanapd/{id}','HomeController@terimaPengajuanAPD');
Route::get('approvepengajuanapd/{id}','HomeController@approvePengajuanAPD');
Route::get('daftar_pengajuan', 'HomeController@daftar_pengajuan');
Route::get('serah_terima', 'HomeController@serah_terima');

//SPPD
Route::get('ppkd/create','SPPDController@createPPKD');
Route::post('ppkd/store','SPPDController@storePPKD');
Route::get('ppkd/list','SPPDController@listPPKD');
Route::post('ppkd/acc','SPPDController@accPPKD');
Route::post('ppkd/tolak','SPPDController@tolakPPKD');
Route::get('sppd/create','SPPDController@createSPPD');
Route::get('sppd/list','SPPDController@listSPPD');



//PAYROLL
Route::get('data_payroll','HomeController@data_payroll');
Route::get('generate_payroll','HomeController@generate_payroll');
Route::post('generate_payroll/simpan','HomeController@simpan_generate_payroll');
Route::get('print_data_payroll/{id}','HomeController@print_data_payroll');

Route::get('payroll','HomeController@getPayroll');
Route::get('payroll/generate','HomeController@generatePayroll');
Route::get('payroll/slipgaji/{id}','HomeController@getSlipGaji');

//presensi
Route::get('presensi','AttendanceController@getPresensi');
Route::get('presensi/generate/jadwal','AttendanceController@getGenerateJadwal');
Route::get('presensi/generate','AttendanceController@getGeneratePresensi');
Route::post('presensi/generate/personal','AttendanceController@personalGeneratePresensi');
Route::post('presensi/generate/persite','AttendanceController@persiteGeneratePresensi');
Route::post('presensi/generate/jadwal/personal','AttendanceController@personalGenerateJadwal');
Route::post('presensi/generate/jadwal/persite','AttendanceController@persiteGenerateJadwal');
Route::post('presensi/generate/jadwal/nonpola','AttendanceController@nonpolaGenerateJadwal');
Route::post('presensi/generate/jadwal/edit','AttendanceController@editGenerateJadwal');

//pegawai
Route::get('pegawai','PegawaiController@getPegawai');
Route::post('pegawai/tambah','PegawaiController@tambahPegawai');
Route::post('pegawai/update','PegawaiController@updatePegawai');
Route::post('pegawai/delete','PegawaiController@deletePegawai');

//lembur
Route::get('penglembur','SPLController@penglembur');
Route::get('penglembur/daftar','SPLController@penglemburDaftar');
Route::get('penglembur/jadwal','SPLController@penglemburJadwal');
Route::get('penglembur/history','SPLController@historyJadwal');
Route::get('penglembur/done/{id}','SPLController@donePenglembur');
Route::post('penglembur/store','SPLController@storePenglembur');
Route::post('penglembur/acc','SPLController@accPenglembur');
Route::post('penglembur/tolak','SPLController@tolakPenglembur');

//absensi
Route::get('absensi','AbsensiController@getFormIzin');
Route::get('absensi/daftar','AbsensiController@absensiDaftar');
Route::get('absensi/jadwal','AbsensiController@absensiJadwal');
Route::get('absensi/history','AbsensiController@absensiHistory');
Route::post('absensi/store','AbsensiController@storeAbsensi');
Route::post('absensi/acc','AbsensiController@accAbsensi');
Route::post('absensi/tolak','AbsensiController@tolakAbsensi');

//setup
Route::get('setup_komponen_gaji', 'SetupController@setup_komponen_gaji');
Route::get('setup_periode_gaji', 'SetupController@setup_periode_gaji');
Route::get('setup_site', 'SetupController@setupSite');
Route::get('setup_pola', 'SetupController@setupPola');
Route::get('setup_schpola', 'SetupController@setupSchPola');
Route::post('setup_site/update', 'SetupController@setupSiteUpdate');
Route::post('setup_site/delete', 'SetupController@setupSiteDelete');
Route::post('setup_site/tambah', 'SetupController@setupSiteTambah');
Route::post('setup_pola/update', 'SetupController@setupPolaUpdate');
Route::post('setup_pola/delete', 'SetupController@setupPolaDelete');
Route::post('setup_pola/tambah', 'SetupController@setupPolaTambah');
Route::post('setup_schpola/update', 'SetupController@setupSchPolaUpdate');
Route::post('setup_schpola/delete', 'SetupController@setupSchPolaDelete');
Route::post('setup_schpola/tambah', 'SetupController@setupSchPolaTambah');
Route::post('setup_komponen_gaji/simpan', 'SetupController@simpan_komponen_gaji');
Route::post('setup_komponen_gaji/edit', 'SetupController@edit_komponen_gaji');
Route::delete('setup_komponen_gaji/delete', 'SetupController@delete_komponen_gaji');
Route::post('setup_periode_gaji/simpan', 'SetupController@simpan_periode_gaji');


Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','RoleController');
Route::resource('users','UserController');
});

Route::get('cetakpdf','HomeController@cetakPdf');
Route::get('basicform','HomeController@basicform');

//UNITKERJA
Route::get('admin/form/permintaan_tenaga_kerja','UnitKerjaController@create');
Route::post('admin/form/store_permintaan_tenaga_kerja','UnitKerjaController@store');
Route::get('admin/daftar_permintaan_tenaga_kerja','UnitKerjaController@index');
Route::get('permintaan_tenaga_kerja/{id}','UnitKerjaController@show');

//KEPEGAWAIAN
Route::get('admin/tambah_data_pegawai','HomeController@tambah_pegawai');
Route::get('admin/data_pegawai','HomeController@index_pegawai');
Route::get('admin/data_pelamar','HomeController@index_pelamar')->name('pegawai.index');;
Route::get('admin/data_pegawai_lulus','HomeController@index_pelamar_lulus');
Route::get('getkecamatan/{id}', 'HomeController@getkecamatan');
Route::post('admin/import_data_pegawai', 'HomeController@import_excel')->name('pegawai.import');
Route::post('admin/store_data_pegawai','HomeController@store_pegawai');
Route::get('detail_pelamar/{id}','HomeController@detail_pelamar');
Route::post('terima_pelamar/{id}','HomeController@terima_pelamar');
Route::get('terima_pelamar_wawancara/{id}','HomeController@terima_pelamar_wawancara');
Route::get('terima_pelamar_bidang/{id}','HomeController@terima_pelamar_bidang');
Route::get('terima_pelamar_psikologi/{id}','HomeController@terima_pelamar_psikologi');
Route::get('terima_pelamar_kesehatan/{id}','HomeController@terima_pelamar_kesehatan');
Route::get('tolak_pelamar/{id}','HomeController@tolak_pelamar');
Route::get('verifikasi_pelamar/{id}','HomeController@verifikasi_pelamar');
Route::post('verifikasi_pelamar/store/{id}','HomeController@store_verifikasi_pelamar');

//HUBNAKER
Route::get('hubnaker/data_pegawai_lulus','HubnakerController@index_pelamar_lulus');
Route::get('hubnaker/pkwt/{id}','HubnakerController@pkwt_pelamar_lulus');


Route::prefix('jobseeker')->group(function(){
    //-x regular
    Route::get('profil/', 'JobseekerController@getProfil');
    Route::get('profil/edit/{id}', 'JobseekerController@editProfil');
    Route::get('notifikasi', 'JobseekerController@getNotifikasi');
    Route::get('riwayattes', 'JobseekerController@getRiwayattes');
    Route::get('lowonganpekerjaan', 'JobseekerController@getLowonganpekerjaan');

    //-x data diri
    Route::get('datadiri/', 'JobseekerController@showDataDiri')->name('JobseekerDatadiri');
    Route::get('datadiri/insert', 'JobseekerController@insertDataDiri');

    //-x Hubungan jobseeker dengan lowongan
    Route::get('dashboard', 'JobseekerController@getDashboard')->name('JobseekerDashboard');
    Route::get('dashboard/show/{id}', 'JobseekerController@showLowongan');
    Route::post('lamaran/subscribe','JobseekerController@subscribeLamaran')->name('JobseekerLowonganSubscribe');

    //-x create method
    Route::get('profil/riwayatpekerjaan/create', 'JobseekerController@createRiwayatpekerjaan');
    Route::get('profil/riwayatpendidikan/create', 'JobseekerController@createRiwayatPendidikan');
    Route::get('profil/sertifikatkeahlian/create', 'JobseekerController@createSertifikatkeahlian');
    Route::get('profil/kemampuanbahasa/create', 'JobseekerController@createKemampuanbahasa');
    Route::get('profil/curiculumvitae/create', 'JobseekerController@createCuriculumvitae');
    Route::get('profil/tentangsaya/create', 'JobseekerController@createTentangsaya');
    Route::get('notifikasi/create', 'JobseekerController@createNotifikasi');
    Route::get('riwayattes/create', 'JobseekerController@createRiwayattes');
    Route::get('lowonganpekerjaan/create', 'JobseekerController@createtLowonganpekerjaan');

    //-x Store method
    Route::post('datadiri/submitdatadiriawal/', 'JobseekerController@storeDataDiriAwal');
    Route::post('datadiri/submitdatadiri/', 'JobseekerController@storeDataDiri');
    Route::post('datadiri/submitpendidikanformal/', 'JobseekerController@storeDataPendidikanFormal');
    Route::post('datadiri/submitpendidikaninformal/', 'JobseekerController@storeDataPendidikanInformal');
    Route::post('datadiri/submitpendidikanbahasa/', 'JobseekerController@storeDataPendidikanBahasa');
    Route::post('datadiri/submitpengalamankerja/', 'JobseekerController@storeDataPengalamanKerja');
    Route::post('datadiri/submitpengalamanorganisasi/', 'JobseekerController@storeDataPengalamanOrganisasi');
    Route::post('datadiri/submitriwayatpenyakit/', 'JobseekerController@storeDataRiwayatPenyakit');
    Route::post('datadiri/submitminat/', 'JobseekerController@storeDataMinat');
    Route::post('datadiri/submitlampiran/', 'JobseekerController@storeDataLampiran');

    //delete data
    Route::delete('datadiri/deletependidikanformal/', 'JobseekerController@destroyDataPendidikanFormal');
    Route::delete('datadiri/deletependidikaninformal/', 'JobseekerController@destroyDataPendidikanInformal');
    Route::delete('datadiri/deletependidikanbahasa/', 'JobseekerController@destroyDataPendidikanBahasa');
    Route::delete('datadiri/deletepengalamankerja/', 'JobseekerController@destroyDataPengalamanKerja');
    Route::delete('datadiri/deletepengalamanorganisasi/', 'JobseekerController@destroyDataPengalamanOrganisasi');
    Route::delete('datadiri/deleteriwayatpenyakit/', 'JobseekerController@destroyDataRiwayatPenyakit');
    Route::delete('datadiri/deleteminat/', 'JobseekerController@destroyDataMinat');
    Route::delete('datadiri/deletelampiran/', 'JobseekerController@destroyDataLampiran');

    //-x support ajax
    Route::post('support/getst/', 'SupportController@getSt');

    Route::get('lampiran/{kategori}','JobSeekerController@getLampiran');
    Route::get('cetakpdf','JobSeekerController@getCetakPdf');

});

//recruitment
Route::get('apply', 'RecruitmentController@create');
Route::post('recruitment/store', 'RecruitmentController@store');
Route::get('getkcmtn/{id}', 'RecruitmentController@getkecamatan');



