<section class="education">

	<header>Pendidikan Bahasa</header>

		@foreach($pendidikan_bahasa as $data)
			<div class="school clear">

				<div>
					<li class="is-bold"> {{ $data->deskripsi_bahasa }}</li>
				</div>

				<div>
					<table>
						<tr>
							<td>  Kemampuan Lisan </td>
							<td> : </td>
							<td>{{$data->tingkat_lisan}}</td>
						</tr>
						<tr>
							<td>  Kemampuan Tertulis </td>
							<td> : </td>
							<td>{{$data->tingkat_tulis}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		@endforeach

</section>