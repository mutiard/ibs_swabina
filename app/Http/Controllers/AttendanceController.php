<?php

namespace App\Http\Controllers;
set_time_limit(1000);

use App\schnikdetail;
use App\tbl_presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function getPresensi()
    {
        $presensi = DB::table('absensi_online')
            ->join('md_karyawan','md_karyawan.id', '=', 'absensi_online.karyawan_id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('absensi_online.deleted_at','=',(NULL) or '')
            ->select('absensi_online.*', 'md_karyawan.nama','md_karyawan.nik','st_site.nama as site')
            ->orderByDesc('absensi_online.scan_date')
            ->get();
        $i = 0;
        foreach ($presensi as $p){
            $tgl[$i] = date('Y-m-d',strtotime($p->scan_date));
            $jam[$i] = date('H:i:s',strtotime($p->scan_date));
            $i++;
        }
        return view('presensi.index', compact('presensi','tgl','jam'));
    }

    public function getGeneratePresensi(Request $request){
        $presensi = DB::table('tbl_presensi')
            ->select('*')
            ->orderbydesc('tgl_jadwal')
            ->get();
        $site = DB::table('st_site')
            ->where('deleted_at','=',(NULL))
            ->get();
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('md_karyawan.nama')
            ->get();
        return view('presensi.generate', compact('presensi','kar','site'));
    }

    public function persiteGeneratePresensi(Request $request){
//        return $request;
        $interval = $request->sdate;

        while($interval <= $request->edate){
            $get_id_kar = DB::select('select distinct ao.karyawan_id
                from absensi_online as ao,md_karyawan as kar
                where date(ao.scan_date) = ? 
                and kar.id = ao.karyawan_id
                and kar.site_id = ?
                order by ao.karyawan_id ASC',[$interval,$request->site]); // $id

            if(count($get_id_kar) > 0){
                foreach ($get_id_kar as $id){
                    $menit_terlambat = 0;
                    $menit_plg_cpt = 0;
                    $tot_menit_lembur = 0;
                    $nilaikoef = 0;
                    $flag_masuk = 0;
                    $flag_pulang = 0;

                    $cek_presensi = DB::table('tbl_presensi')
                        ->where('karyawan_id','=',$id->karyawan_id)
                        ->where('tgl_jadwal','=',$interval)
                        ->get();

                    if (count($cek_presensi) == 0){
                        $jadwal = DB::table('schnikdetail')
                            ->where('users_id','=',$id->karyawan_id)
                            ->where('sdate','=',$interval)
//                            ->where('polaid','<>',"L")
                            ->get();
                        $cek_lembur = DB::select('select * from lembur 
                                                            where date(waktu_awal)=?
                                                            and acc = 1
                                                            and deleted_by = 0  
                                                            and karyawan_id=?',[$interval,$id->karyawan_id]);
                        $tgl_jdwl_masuk = $jadwal[0]->sdate;
                        $tgl_jdwl_pulang = $jadwal[0]->edate;
                        $jadwal_masuk = $jadwal[0]->stime;
                        $jadwal_pulang = $jadwal[0]->etime;

                        if (count($jadwal) != 0){
                            if($jadwal[0]->polaid != "L"){
                                $absen_per_hari = DB::select('select scan_date
                                    from absensi_online 
                                    where karyawan_id = ? 
                                    and date(scan_date) = ?
                                    order by scan_date',[$id->karyawan_id,$interval]);

                                if(count($absen_per_hari) > 0){
                                    //cari jam masuk dan pulang
                                    if(count($absen_per_hari) == 1){
                                        if (date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) >= date('H:i:s', strtotime('-4 hours', strtotime( $jadwal_masuk )))
                                            && date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) <= date('H:i:s', strtotime('+4 hours', strtotime( $jadwal_masuk )))){
                                            $flag_masuk = 1;
                                            $flag_pulang = 0;
                                            $jam_masuk = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_masuk = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                            $jam_pulang = null;
                                            $tgl_pulang = null;
                                        }
                                        elseif (date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) >= date('H:i:s', strtotime('-4 hours', strtotime( $jadwal_pulang )))
                                            && date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) <= date('H:i:s', strtotime('+4 hours', strtotime( $jadwal_pulang )))){
                                            $flag_masuk = 0;
                                            $flag_pulang = 1;
                                            $jam_masuk = null;
                                            $tgl_masuk = null;
                                            $jam_pulang = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_pulang = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                        }
                                        else{
                                            $flag_masuk = 2;
                                            $flag_pulang = 2;
                                            $jam_masuk = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_masuk = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                            $jam_pulang = null;
                                            $tgl_pulang = null;
                                        }
                                    }
                                    elseif (count($absen_per_hari)==2){
                                        if (date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) >= date('H:i:s', strtotime('-4 hours', strtotime( $jadwal_masuk )))
                                            && date('H:i:s', strtotime($absen_per_hari[0]->scan_date)) <= date('H:i:s', strtotime('+4 hours', strtotime( $jadwal_masuk )))){
                                            $flag_masuk = 1;
                                            $jam_masuk = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_masuk = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                        }
                                        else{
                                            $flag_masuk = 0;
                                            $jam_masuk = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_masuk = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                        }

                                        if (date('H:i:s', strtotime($absen_per_hari[1]->scan_date)) >= date('H:i:s', strtotime('-4 hours', strtotime( $jadwal_pulang )))
                                            && date('H:i:s', strtotime($absen_per_hari[1]->scan_date)) <= date('H:i:s', strtotime('+4 hours', strtotime( $jadwal_pulang )))){
                                            $flag_pulang = 1;
                                            $jam_pulang = date('H:i:s', strtotime($absen_per_hari[1]->scan_date));
                                            $tgl_pulang = date('Y-m-d', strtotime($absen_per_hari[1]->scan_date));
                                        }
                                        else{
                                            $flag_pulang = 0;
                                            $jam_pulang = date('H:i:s', strtotime($absen_per_hari[1]->scan_date));
                                            $tgl_pulang = date('Y-m-d', strtotime($absen_per_hari[1]->scan_date));
                                        };
                                    }

                                    //hitung terlambat
                                    if ($flag_masuk != 0){
                                        if($jam_masuk > date('H:i:s', strtotime('+15 minutes', strtotime( $jadwal_masuk )))){
                                            $menit_terlambat = floor((strtotime($jam_masuk) - strtotime($jadwal_masuk))/60);
                                        }
                                    }
                                    if ($flag_pulang != 0){
                                        if($jam_pulang < $jadwal_pulang){
                                            $menit_plg_cpt = floor((strtotime($jadwal_pulang) - strtotime($jam_pulang))/60);
                                        }
                                    }

                                    //hitung lembur
                                    if(count($cek_lembur) > 0){
                                        foreach ($cek_lembur as $lembur){
                                            $koef_lembur = DB::table('st_koef_lembur')
                                                ->where('site_id','=',$request->site)
                                                ->where('id_libur','=',0)
                                                ->get();

                                            $mulai_lembur = date('H:i:s', strtotime($lembur->waktu_awal));
                                            $selesai_lembur = date('H:i:s', strtotime($lembur->waktu_akhir));
                                            if (($lembur->waktu_lembur) == 1 && $flag_masuk == 1){
                                                if (($jam_masuk) <= $mulai_lembur){
                                                    if($selesai_lembur <= $jadwal_masuk){
                                                        $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($mulai_lembur)) / 60);
                                                        $tot_menit_lembur = $tot_menit_lembur + $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    elseif($selesai_lembur > $jadwal_masuk){
                                                        $lembur_mnt = floor(abs(strtotime($jadwal_masuk) - strtotime($mulai_lembur)) / 60);
                                                        $tot_menit_lembur = $tot_menit_lembur + $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                elseif (($jam_masuk) > $mulai_lembur){
                                                    if($selesai_lembur <= $jadwal_masuk){
                                                        $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($jam_masuk)) / 60);
                                                        $tot_menit_lembur = $tot_menit_lembur + $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    elseif ($selesai_lembur > $jadwal_masuk){
                                                        $lembur_mnt = floor(abs(strtotime($jadwal_masuk) - strtotime($jam_masuk)) / 60);
                                                        $tot_menit_lembur = $tot_menit_lembur + $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            elseif (($lembur->waktu_lembur) == 2 && $flag_masuk == 1 && $flag_pulang == 1){
                                                if ($mulai_lembur >= $jadwal_pulang){
                                                    if ($jam_pulang < $selesai_lembur
                                                        && $jam_pulang > $mulai_lembur){
                                                        $lembur_mnt = floor(abs(strtotime($jam_pulang) - strtotime($mulai_lembur)) / 60);
                                                        $tot_menit_lembur = $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    elseif ($jam_pulang >= $selesai_lembur){
                                                        $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($mulai_lembur)) / 60);
                                                        $tot_menit_lembur = $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                elseif ($mulai_lembur < $jadwal_pulang){
                                                    if ($jam_pulang < $selesai_lembur
                                                        && $jam_pulang > $mulai_lembur){
                                                        $lembur_mnt = floor(abs(strtotime($jam_pulang) - strtotime($jadwal_pulang)) / 60);
                                                        $tot_menit_lembur = $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    elseif ($jam_pulang >= $selesai_lembur){
                                                        $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($jadwal_pulang)) / 60);
                                                        $tot_menit_lembur = $lembur_mnt;
                                                        if ($lembur_mnt <= 660){
                                                            foreach ($koef_lembur as $koef){
                                                                if($lembur_mnt >= 60){
                                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                                    $lembur_mnt = $lembur_mnt - 60;
                                                                }
                                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                                    $lembur_mnt = 0;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $store_presensi = new tbl_presensi();
                                $store_presensi->karyawan_id = $id->karyawan_id;
                                $store_presensi->site_id = $request->site;
//                            $store_presensi->kode_shift = $id->groupshift_id;
                                $store_presensi->tgl_masuk = $tgl_masuk;
                                $store_presensi->jam_masuk = $jam_masuk;
                                $store_presensi->tgl_pulang = $tgl_pulang;
                                $store_presensi->jam_pulang = $jam_pulang;
                                $store_presensi->tgl_jadwal = $tgl_jdwl_masuk;
                                $store_presensi->jam_jadwal = $jadwal_masuk;
                                $store_presensi->tgl_jadwal_pulang = $tgl_jdwl_pulang;
                                $store_presensi->jam_jadwal_pulang = $jadwal_pulang;
                                $store_presensi->entry_user = Auth::user()->id;
                                $store_presensi->entry_date = Carbon::now()->toDateTimeString();
//                            $store_presensi->id_number = $id->no_ktp;
                                $store_presensi->mnt_terlambat = $menit_terlambat;
                                $store_presensi->mnt_plgcpt = $menit_plg_cpt;
                                $store_presensi->id_match_masuk = $flag_masuk;
                                $store_presensi->id_match_pulang = $flag_pulang;
                                $store_presensi->mnt_lembur = $tot_menit_lembur;
                                $store_presensi->tot_koef_lembur = $nilaikoef;
                                $store_presensi->save();
                            }
                            else{
                                $koef_lembur = DB::table('st_koef_lembur')
                                    ->where('site_id','=',$request->site)
                                    ->where('id_libur','=',0)
                                    ->get();
                                $absen_per_hari = DB::select('select scan_date
                                    from absensi_online 
                                    where karyawan_id = ? 
                                    and date(scan_date) = ?
                                    order by scan_date',[$id->karyawan_id,$interval]);

                                if (count($cek_lembur) > 0){
                                    foreach ($cek_lembur as $lembur){
                                        $mulai_lembur = date('H:i:s', strtotime($lembur->waktu_awal));
                                        $selesai_lembur = date('H:i:s', strtotime($lembur->waktu_akhir));
                                        if (count($absen_per_hari) == 2){
                                            $jam_masuk = date('H:i:s', strtotime($absen_per_hari[0]->scan_date));
                                            $tgl_masuk = date('Y-m-d', strtotime($absen_per_hari[0]->scan_date));
                                            $jam_pulang = date('H:i:s', strtotime($absen_per_hari[1]->scan_date));
                                            $tgl_pulang = date('Y-m-d', strtotime($absen_per_hari[1]->scan_date));
                                            if ($jam_masuk > $mulai_lembur
                                                && $jam_pulang < $selesai_lembur){
                                                $lembur_mnt = floor(abs(strtotime($jam_pulang) - strtotime($jam_masuk)) / 60);
                                            }
                                            elseif ($jam_masuk <= $mulai_lembur
                                                && $jam_pulang < $selesai_lembur){
                                                $lembur_mnt = floor(abs(strtotime($jam_pulang) - strtotime($mulai_lembur)) / 60);
                                            }
                                            elseif ($jam_masuk > $mulai_lembur
                                                && $jam_pulang >= $selesai_lembur){
                                                $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($jam_masuk)) / 60);
                                            }
                                            elseif ($jam_masuk <= $mulai_lembur
                                                && $jam_pulang >= $selesai_lembur){
                                                $lembur_mnt = floor(abs(strtotime($selesai_lembur) - strtotime($mulai_lembur)) / 60);
                                            }
                                        }
                                        $tot_menit_lembur = $tot_menit_lembur + $lembur_mnt;
                                        if($lembur_mnt <= 660){
                                            foreach ($koef_lembur as $koef){
                                                if($lembur_mnt >= 60){
                                                    $nilaikoef = $nilaikoef + $koef->koef_kali;
                                                    $lembur_mnt = $lembur_mnt - 60;
                                                }
                                                elseif ($lembur_mnt > 0 && $lembur_mnt < 60){
                                                    $nilaikoef = $nilaikoef + (($koef->koef_kali) * ($lembur_mnt/60));
                                                    $lembur_mnt = 0;
                                                }
                                            }
                                        }

                                    }
                                }
                                $store_presensi = new tbl_presensi();
                                $store_presensi->karyawan_id = $id->karyawan_id;
                                $store_presensi->site_id = $request->site;
                                $store_presensi->tgl_masuk = $tgl_masuk;
                                $store_presensi->jam_masuk = $jam_masuk;
                                $store_presensi->tgl_pulang = $tgl_pulang;
                                $store_presensi->jam_pulang = $jam_pulang;
                                $store_presensi->tgl_jadwal = $tgl_jdwl_masuk;
                                $store_presensi->jam_jadwal = $jadwal_masuk;
                                $store_presensi->tgl_jadwal_pulang = $tgl_jdwl_pulang;
                                $store_presensi->jam_jadwal_pulang = $jadwal_pulang;
                                $store_presensi->entry_user = Auth::user()->id;
                                $store_presensi->entry_date = Carbon::now()->toDateTimeString();
                                $store_presensi->mnt_terlambat = $menit_terlambat;
                                $store_presensi->mnt_plgcpt = $menit_plg_cpt;
                                $store_presensi->id_match_masuk = $flag_masuk;
                                $store_presensi->id_match_pulang = $flag_pulang;
                                $store_presensi->mnt_lembur = $tot_menit_lembur;
                                $store_presensi->tot_koef_lembur = $nilaikoef;
                                $store_presensi->save();
                            }
                        }
                        else {
                            $message = 'Jadwal Pegawai tanggal '.$interval.' tidak ditemukan!';
                            return redirect()->back()->with('failed',$message);
                        }
                    }
                }
            }
            $interval = date('Y-m-d', strtotime('+1 days', strtotime( $interval )));
        }
        return redirect()->back()->with('success','Proses Generate Presensi Berhasil!');
    }

    public function getGenerateJadwal(){
        $date = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
        $date = date("Y-m-d",$date);

        $site = DB::table('st_site')
            ->where('deleted_at','=',(NULL))
            ->get();
        $pola = DB::table('schpola_hdr')
            ->get();
        $jadwal = DB::table('schnikdetail')
            ->join('schclass','schclass.kode','=','schnikdetail.polaid')
            ->join('md_karyawan','md_karyawan.id','=','schnikdetail.users_id')
            ->select('schnikdetail.*','schclass.deskripsi','md_karyawan.nama','md_karyawan.nik')
            ->orderby('schnikdetail.users_id')
            ->orderbydesc('schnikdetail.sdate')
            ->get();
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('md_karyawan.nama')
            ->get();
        return view('presensi.generate_jadwal', compact('jadwal','kar','pola','site'));
    }

    public function persiteGenerateJadwal(Request $request){
        $sdate_stamp = strtotime(date('Y-m-d', strtotime($request->sdate)));
        $edate_stamp = strtotime(date('Y-m-d', strtotime($request->edate)));
        $sstamp = date('l', $sdate_stamp);
        $estamp = date('l', $edate_stamp);

        if($sstamp == 'Monday' && $estamp == 'Sunday'){
            $schpola_dtl = DB::table('schpola_dtl')
                ->join('schpola_hdr', 'schpola_dtl.polaid', 'schpola_hdr.kode')
                ->select('schpola_dtl.schclass_id')
                ->where('schpola_dtl.polaid','=', $request->pola)
                ->orderBy('schpola_dtl.hari_ke')
                ->get();
            $kar = DB::table('md_karyawan')
                ->where('site_id','=',$request->site)
                ->get();

            foreach ($kar as $k){
                $start_date = $request->sdate;
                $end_date = $request->edate;
                $i = 0;
                while ($start_date<=($end_date)) {
                    if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$start_date)->first())==null){
                        $time = DB::table('schclass')->where('kode', $schpola_dtl[$i]->schclass_id)->get();

                        $jadwal = new schnikdetail;
                        $jadwal->users_id = $k->id;
                        $jadwal->sdate = $start_date;
                        $jadwal->edate = $start_date;
                        $jadwal->polaid = $schpola_dtl[$i]->schclass_id;
                        $jadwal->stime = $time[0]->stime;
                        $jadwal->etime = $time[0]->etime;
                        $jadwal->entry_user = Auth::user()->id;
                        $jadwal->entry_date = Carbon::now()->toDateTimeString();
                        $jadwal->save();
                        $i++;
                        $start_date = date('Y-m-d', strtotime('+1 days', strtotime( $start_date )));
                        if ($i == 7) {
                            $i = 0;
                        }
                    }
                }
            }
            return redirect()->back()->with('success','Generate Jadwal Personal Berhasil!');
        }
        else{
            return redirect()->back()->with('failed','Start Date dan End Date harus sesuai format!');
        }
    }

    public function personalGenerateJadwal(Request $request){
        $sdate_stamp = strtotime(date('Y-m-d', strtotime($request->sdate)));
        $edate_stamp = strtotime(date('Y-m-d', strtotime($request->edate)));
        $sstamp = date('l', $sdate_stamp);
        $estamp = date('l', $edate_stamp);

        if($sstamp == 'Monday' && $estamp == 'Sunday'){
            $start_date = $request->sdate;
            $end_date = $request->edate;
            $schpola_dtl = DB::table('schpola_dtl')
                ->join('schpola_hdr', 'schpola_dtl.polaid', 'schpola_hdr.kode')
                ->select('schpola_dtl.schclass_id')
                ->where('schpola_dtl.polaid','=', $request->pola)
                ->orderBy('schpola_dtl.hari_ke')
                ->get();
            $i = 0;

            while ($start_date<=($end_date)) {
                if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$start_date)->first())==null){
                    $time = DB::table('schclass')->where('kode', $schpola_dtl[$i]->schclass_id)->get();

                    $jadwal = new schnikdetail;
                    $jadwal->users_id = $request->id;
                    $jadwal->sdate = $start_date;
                    $jadwal->edate = $start_date;
                    $jadwal->polaid = $schpola_dtl[$i]->schclass_id;
                    $jadwal->stime = $time[0]->stime;
                    $jadwal->etime = $time[0]->etime;
                    $jadwal->entry_user = Auth::user()->id;
                    $jadwal->entry_date = Carbon::now()->toDateTimeString();
                    $jadwal->save();
                    $i++;
                    $start_date = date('Y-m-d', strtotime('+1 days', strtotime( $start_date )));
                    if ($i == 7) {
                        $i = 0;
                    }
                }
            }
            return redirect()->back()->with('success','Generate Jadwal Personal Berhasil!');
        }
        else{
            return redirect()->back()->with('failed','Start Date dan End Date harus sesuai format!');
        }
    }

    public function nonpolaGenerateJadwal(Request $request){
        if((schnikdetail::all()->where('users_id','=',$request->id)->where('sdate','=',$request->date)->first())==null){
            $jadwal = new schnikdetail;
            $jadwal->users_id = $request->id;
            $jadwal->sdate = $request->date;
            $jadwal->edate = $request->date;
            $jadwal->polaid = $request->pola;
            $jadwal->stime = $request->stime;
            $jadwal->etime = $request->etime;
            $jadwal->entry_user = Auth::user()->id;
            $jadwal->entry_date = Carbon::now()->toDateTimeString();
            $jadwal->save();
        }
        return redirect()->back()->with('success','Generate Jadwal Non Pola Berhasil!');
    }

    public function editGenerateJadwal(Request $request){
        DB::table('schnikdetail')
            ->where('id','=',$request->id)
            ->update([
                'sdate' => $request->sdate,
                'stime' => $request->stime,
                'edate' => $request->edate,
                'etime' => $request->etime,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Jadwal Pegawai Berhasil!');
    }
}
