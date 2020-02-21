@extends('admin_template')
@section('main-title','Manajemen Pegawai')
@section('manajemen-title')
	Manajemen Pegawai
@endsection
@section('pull-right')
	<a onclick="tambahPegawai()" class="btn btn-primary btn-flat pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Pegawai</a>
@endsection
@section('content')
	<div class="table-responsive">
		<table id="table-pegawai" class="table table-bordered" >
			<thead>
				<tr class="bg-blue">
					<th>No</th>
					<th>NIPY</th>
					<th>Nama Pegawai</th>
					<th>Masa Kerja</th>
					<th>Tunjangan Hari Raya</th>
					<th>Tunjangan Yayasan</th>
					<th>Bonus</th>
					<th>Tunjangan Keahlian</th>
					<th>Lembur</th>
					<th>Aksi</th>
				</tr>
			</thead>
			{{-- <tbody>
				@php
					$no=1;
				@endphp
				@foreach ($pegawai as $pegawai)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $pegawai->nipy }}</td>
						<td>{{ $pegawai->nm_pegawai }}</td>
						<td>{{ $pegawai->masa_kerja }}</td>
						<td>Rp. {{ format_uang($pegawai->tunj_hari_raya) }},-</td>
						<td>Rp. {{ $pegawai->tunj_yayasan }},-</td>
						<td>Rp. {{ $pegawai->bonus }},-</td>
						<td>Rp. {{ $pegawai->tunj_keahlian }},-</td>
						<td>Rp. {{ $pegawai->lembur }},-</td>
						<td>
							<a onclick="editPegawai('.$pegawai->nipy.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a>
                			<a onclick="hapusPegawai('.$pegawai->nipy.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a>
						</td>
					</tr>
					@php
						$no++;
					@endphp
				@endforeach
			</tbody> --}}
		</table>
	</div>
	@include('admin/pegawai.form')
@endsection