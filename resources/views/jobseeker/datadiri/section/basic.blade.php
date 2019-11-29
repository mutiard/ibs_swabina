<section class="education">
	<div class="school clear"><p class="titlecv">Curriculum Vitae</p></div>
</section>
<section class="basic clear">
	
	<div class="info pull-left">

		<p class="title">{{$md_jobseeker[0]->nama_lengkap}}</p>
		<table>
			<tr>
				<td>NIK </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->NIK}}</td>
			</tr>
			<tr>
				<td>Tempat Tanggal Lahir </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->tempat_lahir}}, {{$md_jobseeker[0]->tanggal_lahir}}</td>
			</tr>
			<tr>
				<td>Alamat </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->alamat_ktp}}</td>
			</tr>
			<tr>
				<td>Alamat Domisili</td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->alamat_domisili}}</td>
			</tr>
			<tr>
				<td>Email </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->email}}</td>
			</tr>
			<tr>
				<td>Jenis Kelamin </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->jenis_kelamin}}</td>
			</tr>
			<tr>
				<td>Agama </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->agama}}</td>
			</tr>
			<tr>
				<td>No HP </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->nohp}}</td>
			</tr>
			<tr>
				<td>Status Pernikahan </td>
				<td> : </td>
				<td>{{$md_jobseeker[0]->status_keluarga}}</td>
			</tr>
		</table>
	</div>

	<div class="pull-right">
		<img src="{{storage_path('app/jobseeker/foto_pelamar/'.$md_jobseeker[0]->lampiran_foto)}}" width="120px" height="180px">
	</div>

</section>

<div class="space-block"></div>
