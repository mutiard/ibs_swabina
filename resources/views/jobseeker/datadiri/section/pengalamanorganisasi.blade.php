<section class="education">

	<header>Pengalaman Organisasi</header>

		@foreach($pengalaman_organisasi as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->organisasi }} </li>
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
							<td>  Posisi </td>
							<td> : </td>
							<td>{{$data->posisi}}</td>
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