<section class="education">

	<header>Minat Pekerjaan</header>

		@foreach($minat as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->name_bidangbisnis }}</li>
				</div>

				<div>
					<table>
						<tr>
							<td>  Gaji Bulanan </td>
							<td> : </td>
							<td>{{$data->gaji_bulanan}}</td>
						</tr>
						<tr>
							<td>  Lingkungan </td>
							<td> : </td>
							<td>{{$data->lingkungan}}</td>
						</tr>
						<tr>
							<td>  Spesialisasi </td>
							<td> : </td>
							<td>{{$data->spesial}}</td>
						</tr>
						<tr>
							<td>  Posisi </td>
							<td> : </td>
							<td>{{$data->posisi}}</td>
						</tr>
						<tr>
							<td>  Jabatan </td>
							<td> : </td>
							<td>{{$data->jabatan}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		@endforeach

</section>