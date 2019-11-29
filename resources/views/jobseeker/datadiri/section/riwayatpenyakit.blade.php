<section class="education">

	<header>Riwayat Penyakit</header>

		@foreach($riwayat_penyakit as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->nama_penyakit }} </li>
				</div>

				<div>
					<table>
						<tr>
							<td>  Waktu </td>
							<td> : </td>
							<td>{{date('d-M-Y', strtotime($data->tanggal_mulai))}} s/d {{date('d-M-Y', strtotime($data->tanggal_mulai))}}</td>
						</tr>
						<tr>
							<td>  Pengaruh </td>
							<td> : </td>
							<td>{{$data->pengaruh}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		@endforeach

</section>