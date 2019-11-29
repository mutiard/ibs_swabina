<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header text-center">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('assets/img/profile_small.jpg') }}" />
                    </span>
                    <span class="clear">
                        <span class="block m-t-xs">
                            <strong class="font-bold" style="color: white;">{{ Auth::user()->name }}</strong>
                        </span>
                    </span>
                </div>
                <div class="logo-element" style="background:#f3f3f4;">
                    <img src="{{ asset('assets/img/dboard/logo/sublogo.png') }}" width="30px">
                </div>
            </li>

            <li class="@if(url('dashboard') == request()->url()) active @else '' @endif treeview">
                <a href="{{url('dashboard')}}"><i class="fa fa-tachometer"></i>
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>
            <li class="@if(url('admin/form/permintaan_tenaga_kerja') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Pemasaran</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('admin/form/permintaan_tenaga_kerja') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Rekrutmen</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('admin/form/permintaan_tenaga_kerja') == request()->url()) active @else '' @endif">
                                <a href="{{ url('admin/form/permintaan_tenaga_kerja') }}">Proses Kontrak</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('admin/form/permintaan_tenaga_kerja') == request()->url()
                or url('admin/daftar_permintaan_tenaga_kerja') == request()->url()
                or url('daftar_pengajuan') == request()->url()
                or url('serah_terima') == request()->url() 
                or url('ppkd/create') == request()->url()
                or url('sppd/create') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Unit Kerja</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('admin/form/permintaan_tenaga_kerja') == request()->url()
                        or url('admin/daftar_permintaan_tenaga_kerja') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Rekrutmen</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('admin/daftar_permintaan_tenaga_kerja') == request()->url()) active @else '' @endif">
                                <a href="{{ url('admin/daftar_permintaan_tenaga_kerja') }}">Permintaan Pegawai</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@if(url('daftar_pengajuan') == request()->url()
                        or url('serah_terima') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">APD</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('daftar_pengajuan') == request()->url()) active @else '' @endif">
                                <a href="{{ url('daftar_pengajuan') }}">Approval/Persetujuan Pengajuan APD</a>
                            </li>
                            <li class="@if(url('serah_terima') == request()->url()) active @else '' @endif">
                                <a href="{{ url('serah_terima') }}">Serah Terima APD</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@if(url('ppkd/create') == request()->url()
                        or url('sppd/create') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">SPPD</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('ppkd/create') == request()->url()) active @else '' @endif">
                                <a href="{{ url('ppkd/create') }}">Pengajuan PPKD</a>
                            </li>
                            <li class="@if(url('sppd/create') == request()->url()) active @else '' @endif">
                                <a href="{{ url('sppd/create') }}">Pengajuan SPPD</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('admin/tambah_data_pegawai') == request()->url()
                or url('admin/data_pegawai') == request()->url()
                or url('admin/data_pelamar') == request()->url()
                or url('admin/data_pegawai_lulus') == request()->url()
                or url('datakaryawan') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Kepegawaian</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('admin/tambah_data_pegawai') == request()->url()
                        or url('admin/data_pelamar') == request()->url()
                        or url('admin/data_pegawai') == request()->url()
                        or url('admin/data_pegawai_lulus') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Rekrutmen</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('admin/tambah_data_pegawai') == request()->url()) active @else '' @endif">
                                <a href="{{ url('admin/tambah_data_pegawai') }}">Lamaran Internal</a>
                            </li>
                            <li class="@if(url('admin/data_pelamar') == request()->url()) active @else '' @endif">
                                <a href="{{ url('admin/data_pelamar') }}">Data Pelamar</a>
                            </li>
                            <li class="@if(url('admin/data_pegawai') == request()->url()) active @else '' @endif">
                                <a href="{{ url('admin/data_pegawai') }}">Proses Seleksi Rekrutmen</a>
                            </li>
                            <li class="@if(url('admin/data_pegawai_lulus') == request()->url()) active @else '' @endif">
                                <a href="{{url('admin/data_pegawai_lulus')}}">Daftar Pelamar Lulus Seleksi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@if(url('datakaryawan') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">APD</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('datakaryawan') == request()->url()) == request()->url()) active @else '' @endif">
                                <a href="{{ url('datakaryawan') }}">Pengajuan APD</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('hubnaker/data_pegawai_lulus') == request()->url() or url('periode_penilaian') == request()->url() or url('histori_penilaian') == request()->url() or url('data_sanksi_pegawai') == request()->url() or url('tambah_sanksi_pegawai') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Hubnaker</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('hubnaker/data_pegawai_lulus') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Rekrutmen</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('hubnaker/data_pegawai_lulus') == request()->url()) active @else '' @endif">
                                <a href="{{url('hubnaker/data_pegawai_lulus')}}">Persetujuan Hasil Seleksi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@if(url('periode_penilaian') == request()->url() or url('histori_penilaian') == request()->url() or url('data_sanksi_pegawai') == request()->url() or url('tambah_sanksi_pegawai') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Penilaian Pegawai</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('periode_penilaian') == request()->url()) active @else '' @endif">
                                <a href="{{url('periode_penilaian')}}">Setup Periode Penilaian</a>
                            </li>
                            <li class="@if(url('histori_penilaian') == request()->url()) active @else '' @endif">
                                <a href="{{url('histori_penilaian')}}">Histori Penilaian Pegawai</a>
                            </li>
                            <li class="@if(url('data_sanksi_pegawai') == request()->url() or url('tambah_sanksi_pegawai') == request()->url()) active @else '' @endif">
                                <a href="{{url('data_sanksi_pegawai')}}">Sanksi Pegawai</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('serah_terima') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">K3</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('serah_terima') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">APD</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('serah_terima') == request()->url()) active @else '' @endif">
                                <a href="{{ url('serah_terima') }}">Serah Terima APD</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('penilaian_datakaryawan') == request()->url()
                or url('ppkd/list') == request()->url()
                or url('sppd/list') == request()->url()) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Atasan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('penilaian_datakaryawan') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Penilaian Pegawai</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('penilaian_datakaryawan') == request()->url()) active @else '' @endif">
                                <a href="{{ url('penilaian_datakaryawan') }}">Penilaian Pegawai</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('ppkd/list') == request()->url()
                        or url('sppd/list') == request()->url()) active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">SPPD</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('ppkd/list') == request()->url()) active @else '' @endif">
                                <a href="{{ url('ppkd/list') }}">Approval PPKD</a>
                            </li>
                            <li class="@if(url('sppd/list') == request()->url()) active @else '' @endif">
                                <a href="{{ url('sppd/list') }}">Approval SPPD</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="@if(url('requestpekerjaan') == request()->url()) active @else '' @endif treeview">
                <a href="{{url('requestpekerjaan')}}"><i class="fa fa-exchange"></i>
                    <span class="nav-label">Request Pegawai</span>
                </a>
            </li>
                <!-- <li class="treeview sidebar data-master">
                <a href="#" id="step1"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Template</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class=" sidebar master-akun">
{{--                        <a href="{{ url('cetakpdf') }}"><i class="" aria-hidden="true"></i><span class="nav-label">DomPDF</span></a>--}}
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class=" sidebar master-akun">
{{--                        <a href="{{ url('basicform') }}"><i class="active" aria-hidden="true"></i><span class="nav-label">basicform</span></a>--}}
                    </li>
                </ul>
            </li> -->
            {{--    <li class="@if(url('data_payroll') == request()->url() or url('generate_payroll') == request()->url()) active @else '' @endif treeview">--}}
                {{--        <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Payroll</span><span class="fa arrow"></span></a>--}}
                {{--        <ul class="nav nav-second-level collapse">--}}
                    {{--            <li class="@if(url('data_payroll') == request()->url()) active @else '' @endif">--}}
                        {{--                <a href="{{url('data_payroll')}}">Data Payroll</a>--}}
                    {{--            </li>--}}
                {{--        </ul>--}}
                {{--        <ul class="nav nav-second-level collapse">--}}
                    {{--            <li class="@if(url('generate_payroll') == request()->url()) active @else '' @endif">--}}
                        {{--                <a href="{{ url('generate_payroll') }}">Generate Payroll</a>--}}
                    {{--            </li>--}}
                {{--        </ul>--}}
            {{--    </li>--}}


{{--            <li class="@if(url('payroll') == request()->url()--}}
{{--                or url('/payroll/slipgaji/{id}') == request()->url()) active @else '' @endif  treeview">--}}
{{--                <a href="{{ url('payroll')}}"><i class="fa fa-usd"></i> <span class="nav-label">Generate Payroll</span></a>--}}
{{--            </li>--}}
            <li class="@if(url('pegawai') == request()->url()) active @else '' @endif treeview">
                <a href="{{url('pegawai')}}"><i class="fa fa-database"></i>
                    <span class="nav-label">Data Pegawai</span>
                </a>
            </li>
            <li class="@if(url('penglembur') == request()->url()
                or url('penglembur/daftar') == request()->url()
                or url('penglembur/jadwal') == request()->url()
                or url('penglembur/history') == request()->url())
                active @else '' @endif treeview">
                <a href="#"><i class="fa fa-coffee"></i> <span class="nav-label">Lembur</span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('penglembur') == request()->url()
                        or url('penglembur/daftar') == request()->url())
                        active @else '' @endif @endiftreeview">
                        <a href="#"><span class="nav-label">SPL</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('penglembur') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur') }}">Form Pengajuan</a></li>
                            <li class="@if(url('penglembur/daftar') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur/daftar') }}">Daftar Pengajuan</a></li>
                        </ul>
                    </li>
                    <li class="@if(url('penglembur/jadwal') == request()->url()
                        or url('penglembur/history') == request()->url())
                        active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Data Lembur</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="@if(url('penglembur/jadwal') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur/jadwal') }}">Jadwal Lembur</a></li>
                            <li class="@if(url('penglembur/history') == request()->url()) active @else '' @endif"><a href="{{ url('penglembur/history') }}">History</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

{{--            <li class="@if(url('cuti') == request()->url()--}}
{{--                or url('cuti/daftar') == request()->url()--}}
{{--                or url('cuti/jadwal') == request()->url()--}}
{{--                or url('cuti/history') == request()->url())--}}
{{--                active @else '' @endif treeview">--}}
{{--                <a href="#"><i class="fa fa-paper-plane"></i> <span class="nav-label">Absensi</span><span class="fa arrow"></span></a>--}}

{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li class="@if(url('cuti') == request()->url()--}}
{{--                        or url('cuti/daftar') == request()->url())--}}
{{--                        active @else '' @endif @endiftreeview">--}}
{{--                        <a href="#"><span class="nav-label">Cuti</span><span class="fa arrow"></span></a>--}}

{{--                        <ul class="nav nav-third-level collapse">--}}
{{--                            <li class="@if(url('cuti') == request()->url()--}}
{{--                            or url('cuti/daftar') == request()->url())--}}
{{--                            active @else '' @endif @endiftreeview">--}}
{{--                            <a href="#"><span class="nav-label">SPC</span><span class="fa arrow"></span></a>--}}

{{--                                <ul class="nav nav-third-level">--}}
{{--                                    <li class="@if(url('cuti') == request()->url()) active @else '' @endif"><a href="{{ url('cuti') }}">Form Pengajuan</a></li>--}}
{{--                                    <li class="@if(url('cuti/daftar') == request()->url()) active @else '' @endif"><a href="{{ url('cuti/daftar') }}">Daftar Pengajuan</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                        <ul class="nav nav-third-level collapse">--}}
{{--                            <li class="@if(url('cuti/jadwal') == request()->url()--}}
{{--                                or url('cuti/history') == request()->url())--}}
{{--                                active @else '' @endif treeview">--}}
{{--                                <a href="#"><span class="nav-label">Data Cuti</span><span class="fa arrow"></span></a>--}}

{{--                                <ul class="nav nav-third-level">--}}
{{--                                    <li class="@if(url('cuti/jadwal') == request()->url()) active @else '' @endif"><a href="{{ url('cuti/jadwal') }}">Jadwal Cuti</a></li>--}}
{{--                                    <li class="@if(url('cuti/history') == request()->url()) active @else '' @endif"><a href="{{ url('cuti/history') }}">History</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li class="@if(url('absensi') == request()->url()
                or url('absensi/daftar') == request()->url()
                or url('absensi/jadwal') == request()->url()
                or url('absensi/history') == request()->url())
                active @else '' @endif treeview">
                <a href="#"><i class="fa fa-paper-plane"></i> <span class="nav-label">Absensi</span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('absensi') == request()->url()
                        or url('absensi/daftar') == request()->url()
                        or url('absensi/history') == request()->url()
                        or url('absensi/jadwal') == request()->url())
                        active @else '' @endif @endiftreeview">
                        <a href="#"><span class="nav-label">Perizinan</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-third-level">
                            <li class="@if(url('absensi') == request()->url()) active @else '' @endif"><a href="{{ url('absensi') }}">Form Pengajuan</a></li>
                            <li class="@if(url('absensi/daftar') == request()->url()) active @else '' @endif"><a href="{{ url('absensi/daftar') }}">Daftar Pengajuan</a></li>
                            <li class="@if(url('absensi/jadwal') == request()->url()) active @else '' @endif"><a href="{{ url('absensi/jadwal') }}">Jadwal Perizinan</a></li>
                            <li class="@if(url('absensi/history') == request()->url()) active @else '' @endif"><a href="{{ url('absensi/history') }}">History Perizinan</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('cuti/jadwal') == request()->url()
                        or url('cuti/history') == request()->url())
                        active @else '' @endif treeview">
                        <a href="#"><span class="nav-label">Data Cuti</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-third-level">
                            <li class="@if(url('cuti/jadwal') == request()->url()) active @else '' @endif"><a href="{{ url('cuti/jadwal') }}">Jadwal Cuti</a></li>
                            <li class="@if(url('cuti/history') == request()->url()) active @else '' @endif"><a href="{{ url('cuti/history') }}">History</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="@if(url('/presensi') == request()->url()
                or url('/presensi/generate') == request()->url()
                or url('/presensi/generate/jadwal') == request()->url()
                ) active @else '' @endif treeview">
                <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Presensi</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('/presensi') == request()->url()) active @else '' @endif"><a href="{{ url('/presensi') }}">Daftar Absensi</a></li>
                    <li class="@if(url('/presensi/generate/jadwal') == request()->url()) active @else '' @endif"><a href="{{ url('/presensi/generate/jadwal') }}">Generate Jadwal</a></li>
                    <li class="@if(url('/presensi/generate') == request()->url()) active @else '' @endif"><a href="{{ url('/presensi/generate') }}">Generate Presensi</a></li>
                </ul>
            </li>

            {{--            <li class="treeview sidebar data-master">--}}
                {{--                <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Manajemen Hak Akses</span><span class="fa arrow"></span></a>--}}
                {{--                @can('users-list')--}}
                {{--                <ul class="nav nav-second-level collapse">--}}
                    {{--                    <li class=" sidebar master-akun">--}}
                        {{--                        <a href="{{ url('users') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Manajemen User</span></a>--}}
                    {{--                    </li>--}}
                {{--                </ul>--}}
                {{--                @endcan--}}
                {{--                @can('role-list')--}}
                {{--                <ul class="nav nav-second-level collapse">--}}
                    {{--                    <li class=" sidebar master-akun">--}}
                        {{--                        <a href="{{ url('roles') }}"><i class="active" aria-hidden="true"></i><span class="nav-label">Manajemen Role</span></a>--}}
                    {{--                    </li>--}}
                {{--                </ul>--}}
                {{--                @endcan--}}
            {{--            </li>--}}
            <li class="@if(url('setup_komponen_gaji') == request()->url()
            or url('setup_periode_gaji') == request()->url()
            or url('setup_pola') == request()->url()
            or url('setup_schpola') == request()->url()
            or url('setup_site') == request()->url()
            ) active @else '' @endif treeview sidebar data-master">
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Setup System</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('setup_komponen_gaji') == request()->url()) active @else '' @endif">
                        <a href="{{ url('setup_komponen_gaji') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Komponen Gaji</span></a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('setup_periode_gaji') == request()->url()) active @else '' @endif">
                        <a href="{{ url('setup_periode_gaji') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Periode Gaji</span></a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('setup_schpola') == request()->url()) active @else '' @endif">
                        <a href="{{ url('setup_schpola') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Pola Class</span></a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('setup_pola') == request()->url()) active @else '' @endif">
                        <a href="{{ url('setup_pola') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Pola Jadwal</span></a>
                    </li>
                </ul>
                <ul class="nav nav-second-level collapse">
                    <li class="@if(url('setup_site') == request()->url()) active @else '' @endif">
                        <a href="{{ url('setup_site') }}"><i class="" aria-hidden="true"></i><span class="nav-label">Site</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
