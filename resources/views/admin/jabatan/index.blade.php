@extends('admin_template')
@section('main-title','Manajemen Jabatan Pegawai')
@section('manajemen-title')
	Manajemen Jabatan Pegawai
@endsection
@section('pull-right')
	<a onclick="tambahJabatan()" class="btn btn-primary btn-flat pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Jabatan Pegawai</a>
@endsection
@section('content')
	<div class="table-responsive">
		<table id="table-jabatan" class="table table-bordered" >
			<thead>
				<tr class="bg-blue">
					<th>No</th>
					<th>Jabatan</th>
					<th>Gaji Pokok</th>
					<th>Tunjangan Jabatan</th>
					<th>Uang Makan</th>
					<th>Tunjangan Akomodasi</th>
					<th>Tunjangan Pulsa</th>
					<th>Tunjangan BBM</th>
					<th>Potongan</th>
					<th>Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
	@include('admin/jabatan.form')
@endsection