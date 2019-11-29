@extends('jobseeker.datadiri.layoutresume.base')

@section('title', 'PDF Preview')

@section('styles')
	<link rel="stylesheet" href="{{ asset('resume-pdf.css') }}">
@stop

@section('content')
	@include('jobseeker.datadiri.section.basic')
	@include('jobseeker.datadiri.section.pendidikan')
	@include('jobseeker.datadiri.section.pendidikannonformal')
	@include('jobseeker.datadiri.section.pendidikanbahasa')
	@include('jobseeker.datadiri.section.riwayatpekerjaan')
	@include('jobseeker.datadiri.section.minat')
	@include('jobseeker.datadiri.section.pengalamanorganisasi')
	@include('jobseeker.datadiri.section.riwayatpenyakit')
	
	
@stop