<section class="education">

	<header>Pendidikan</header>

		@foreach($pendidikan as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->strata }} ({{$data->institusi}} ) </li>
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
							<td>  Jurusan </td>
							<td> : </td>
							<td>{{$data->jurusan}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		@endforeach

</section>