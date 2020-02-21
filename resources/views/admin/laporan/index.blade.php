@extends('admin_template')
@section('main-title','Laporan Gaji Pegawai')
@section('manajemen-title')
	Laporan Gaji Pegawai
@endsection
@section('pull-right')
	<p>Total Pengeluaran {{ date('M Y',strtotime($laporan[0]->bulan)) }}: <b> Rp.{{ format_uang($total) }},- </b></p>
@endsection
@section('content')
	<div class="table-responsive">
		<table id="table-laporan" class="table table-bordered" >
			<thead>
				<tr class="bg-blue">
					<th>No</th>
					<th>NIPY</th>
					<th>Nama Pegawai</th>
					<th>Masa Kerja</th>
					<th>Tunjanga Masa Kerja</th>
					<th>Jabatan</th>
					<th>Gaji Pokok</th>
					<th>Tunjangan Jabatan</th>
					<th>Uang Makan</th>
					<th>Tunjangan Akomodasi</th>
					<th>Tunjangan Pulsa</th>
					<th>Tunjangan BBM</th>
					<th>Tunjangan Hari Raya</th>
					<th>Tunjangan Keahlian</th>
					<th>Tunjangan Yayasan</th>
					<th>Bonus</th>
					<th>Lembur</th>
					<th>Potongan</th>
					<th>Total Pendapatan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$no=1;
				@endphp
				@foreach ($laporan as $laporan) 
				@php $tunj_masa_kerja = 0; $tot=0; if($laporan->masa_kerja >= 10){$tunj_masa_kerja = 100000;} 
				$tot = ($laporan->gaji_pokok+$laporan->tunj_jabatan+$laporan->uang_makan+$laporan->tunj_akomodasi+$laporan->tunj_pulsa+$laporan->tunj_bbm+$laporan->tunj_hari_raya+$laporan->tunj_keahlian+$laporan->tunj_yayasan+$laporan->bonus+$laporan->lembur+$tunj_masa_kerja)-$laporan->potongan
				@endphp
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $laporan->nipy }}</td>
						<td>{{ $laporan->nm_pegawai }}</td>
						<td>{{ $laporan->masa_kerja }} Tahun</td>
						<td>Rp.{{ $tunj_masa_kerja }},-</td>
						<td>{{ $laporan->nm_jabatan }}</td>
						<td>Rp. {{ $laporan->gaji_pokok }},-</td>
						<td>Rp. {{ $laporan->tunj_jabatan }},-</td>
						<td>Rp. {{ $laporan->uang_makan }},-</td>
						<td>Rp. {{ $laporan->tunj_akomodasi }},-</td>
						<td>Rp. {{ $laporan->tunj_pulsa }},-</td>
						<td>Rp. {{ $laporan->tunj_bbm }},-</td>
						<td>Rp. {{ $laporan->tunj_hari_raya }},-</td>
						<td>Rp. {{ $laporan->tunj_keahlian }},-</td>
						<td>Rp. {{ $laporan->tunj_yayasan }},-</td>
						<td>Rp. {{ $laporan->bonus }},-</td>
						<td>Rp. {{ $laporan->lembur }},-</td>
						<td>Rp. {{ $laporan->potongan }},-</td>
						<td>Rp. @php echo $tot; @endphp</td>
						<td>
							<a href="{{ route('print_detail',$laporan->nipy) }}" class="btn btn-primary btn-flat"><i class="fa fa-print"></i></a>
						</td>
					</tr>
					@php
						$no++;
					@endphp
				@endforeach
			</tbody>
		</table>
	</div>
	@include('admin/pegawai.form')
@endsection