<section class="education">

	<header>Riwayat Pekerjaan</header>

		@foreach($pekerjaan as $data)
			<div class="school clear">

				<div>
					<li>{{ $data->posisi }}, <strong>{{$data->nama_perusahaan}}, {{$data->lokasi_kerja}} </strong> ({{date('d-M-Y', strtotime($data->tanggal_mulai))}} s/d {{date('d-M-Y', strtotime($data->tanggal_mulai))}})</li>
				</div>
			
			</div>
		@endforeach

</section>