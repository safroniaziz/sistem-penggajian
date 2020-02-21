<!DOCTYPE html>
<html>
<head>
	<title>Laporan Detail</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>
	<table>
		<tr>
			<td width="80" rowspan="6" style="text-align: center;">
				<img src="{{ asset('assets/images/logo.jpg') }}" width="100" style="margin-left: 4px; margin-right: auto; display: block;">
			</td>
		</tr>
		<tr>
			<td align="center">Jl. WR. Supratman No. 26 RT.03 RW. 01 Kel Pematang Gubernur </td>
		</tr>
		<tr>
			<td align="center">Kec. Muara Bangkahulu Kota Bengkulu Telp. (0736) 7310203/ </td>
		</tr>
		<tr>
			<td align="center">
				Hp.081367499554 Email. adm.yayasanhaqiqi@gmail.com

			</td>
		</tr>
	</table>
	<hr>
	<table class="table table-bordered table-sm">
		<?php 
			foreach ($detail as $detail) {
				$tunj_masa_kerja = 0; $tot=0; if($detail->masa_kerja >= 10){$tunj_masa_kerja = 100000;} 
				$tot = ($detail->gaji_pokok+$detail->tunj_jabatan+$detail->uang_makan+$detail->tunj_akomodasi+$detail->tunj_pulsa+$detail->tunj_bbm+$detail->tunj_hari_raya+$detail->tunj_keahlian+$detail->tunj_yayasan+$detail->bonus+$detail->lembur+$tunj_masa_kerja)-$detail->potongan
				
		?>

			<tr>
				<td style="font-weight: bold;">NIP</td>
				<td colspan="2">{{ $detail->nipy }}</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">NAMA PEGAWAI</td>
				<td colspan="2">{{ $detail->nm_pegawai }}</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">JABATAN</td>
				<td colspan="2">{{ $detail->nm_jabatan }}</td>
			</tr>
			<tr>
				<td style="font-weight: bold;">MASA KERJA</td>
				<td colspan="2">{{ $detail->masa_kerja }}</td>
			</tr>

			<tr>
				<td colspan="2">
					<p style="text-align: center; font-weight: bold;">PENDAPATAN</p>

				</td>
				<td>
					<p style="text-align: center; font-weight: bold;">POTONGAN</p>
				</td>
			</tr>
			<br>
			<tr>
				<td>Tunjangan Jabatan</td>
				<td>Rp.{{ $detail->tunj_jabatan }},-</td>
				<td rowspan="11">Rp.{{ $detail->potongan }},-</td>
			</tr>
			<tr>
				<td>Tunjangan Masa Kerja</td>
				<td>Rp.{{ $tunj_masa_kerja }},-</td>
			</tr>
			<tr>
				<td>Uang Makan</td>
				<td>Rp.{{ $detail->uang_makan }},-</td>
			</tr>

			<tr>
				<td>Tunjangan Akomodasi</td>
				<td>Rp.{{ $detail->tunj_akomodasi }},-</td>
			</tr>

			<tr>
				<td>Tunjangan Pulsa</td>
				<td>Rp.{{ $detail->tunj_pulsa }},-</td>
			</tr>

			<tr>
				<td>Tunjangan BBM</td>
				<td>Rp.{{ $detail->tunj_bbm }},-</td>
			<tr>
				<td>Tunjangan Hari Raya</td>
				<td>Rp.{{ $detail->tunj_hari_raya }},-</td>
			</tr>
			<tr>
				<td>Tunjangan Keahlian</td>
				<td>Rp.{{ $detail->tunj_keahlian }},-</td>
			</tr>
			<tr>
				<td>Tunjangan Yayasan</td>
				<td>Rp.{{ $detail->tunj_yayasan }},-</td>
			</tr>
			<tr>
				<td>Bonus</td>
				<td>Rp.{{ $detail->bonus }},-</td>
			</tr>
			<tr>
				<td>Lembur</td>
				<td>Rp.{{ $detail->lembur }},-</td>
			</tr>
			<tr>
				<td style="font-weight: bold; text-align: center;">Total Pendapatan</td>
				<td colspan="2" style="font-weight: bold; text-align: center;">Rp.{{ $detail->potongan }},-</td>
			</tr>
			<tr>
				<td style="font-weight: bold; text-align: center;">Keterangan Waktu</td>
				<td colspan="2" style="font-weight: bold; text-align: center;">{{ date('M Y',strtotime($detail->bulan)) }}</td>
			</tr>
		<?php 
			}
		?>
	</table>

	<table style="width: 100%" border="">
		<tr >
			<td style="text-align: center; margin-bottom: 200px;">DIAJUKAN OLEH</td>
			<td style="text-align: center; margin-bottom: 200px;">MENGETAHUI</td>
			<td style="text-align: center; margin-bottom: 200px;">DITERIMA OLEH</td>
		</tr>
		<tr style="visibility: hidden;">
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr style="visibility: hidden;">
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr style="visibility: hidden;">
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr>
			<td style="text-align: center;">SRI ARFAYATI</td>
			<td style="text-align: center;">HJ. LIRWANA, SP.,M.TPd	</td>
			<td style="text-align: center;">{{ $detail->nm_pegawai }}</td>
		</tr>
		<tr>
			<td style="text-align: center;">BENDAHARA</td>
			<td style="text-align: center;">BPH YAYASAN	</td>
			<td style="text-align: center;">{{ $detail->nm_jabatan }}</td>
		</tr>
	</table>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>