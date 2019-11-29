<section class="education">

	<header>Pendidikan Non Formal</header>

		@foreach($pendidikan_nonformal as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->jenis_pelatihan }}</li>
				</div>

				<div>
					<table>
						<tr>
							<td>  Waktu </td>
							<td> : </td>
							<td>{{date('d-M-Y', strtotime($data->tanggal_mulai))}} s/d {{date('d-M-Y', strtotime($data->tanggal_mulai))}}</td>
						</tr>
						<tr>
							<td>  Tempat </td>
							<td> : </td>
							<td>{{$data->tempat}}</td>
						</tr>
						<tr>
							<td>  Keterangan </td>
							<td> : </td>
							<td>{{$data->keterangan}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		@endforeach

</section>