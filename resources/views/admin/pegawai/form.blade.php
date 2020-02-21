<div class="modal fade" id="form-pegawai" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-lg" id="modal-dialog">
		<div class="modal-content" id="modal-content">
			<form method="post"  id="form" class="form-horizontal" data-toggle="validator">
				{{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header bg-yellow" id="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: white;">&times;</span>
					</button>
					<h4 id="exampleModalLabel" style="margin-top: 15px; margin-bottom: 0px;" ><img src="{{ asset('assets/images/logo.jpg') }}" style="width: 30px; margin-right: 10px; float: left; margin-top: -15px; " alt="">&nbsp;&nbsp;<p id="modal-title" style="float: left; font-weight: bold; margin-top: -10px;"></p>
		        </h4>
				</div>

				<div class="modal-body">
					<input type="hidden" id="nipy" name="nipy">
					<div class="form-group">
						<label for="nipy" class="col-md-3 control-label">Nomor Induk Pegawai Yayasan (NIPY) :</label>
						<div class="col-md-8">
							<input type="number" name="nipy" class="form-control" id="nip">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="nm_pegawai" class="col-md-3 control-label">Nama Pegawai</label>
						<div class="col-md-8">
							<input type="text" name="nm_pegawai" class="form-control" id="nm_pegawai">
						</div>
					</div>

					<div class="form-group">
						<label for="id_jabatan" class="col-md-3 control-label">Jabatan</label>
						<div class="col-md-8">
							<select name="id_jabatan" class="form-control" id="id_jabatan">
								<?php 
									$pegawai = DB::table('tb_jabatan')
												->select('id_jabatan','nm_jabatan')
												->get();
									foreach ($pegawai as $pegawai) {
								?>
									<option value="{{ $pegawai->id_jabatan }}">{{ $pegawai->nm_jabatan }}</option>
								<?php 
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="masa_kerja" class="col-md-3 control-label">Lama Masa Kerja (Th)</label>
						<div class="col-md-8">
							<input type="number" name="masa_kerja" class="form-control" id="masa_kerja">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_hr_raya_cuti" class="col-md-3 control-label">Tunjangan Hari Raya</label>
						<div class="col-md-8">
							<input type="number" name="tunj_hari_raya" class="form-control" id="tunj_hari_raya">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_yayasan" class="col-md-3 control-label">Tunjangan Yayasan</label>
						<div class="col-md-8">
							<input type="number" name="tunj_yayasan" class="form-control" id="tunj_yayasan">
						</div>
					</div>

					<div class="form-group">
						<label for="bonus" class="col-md-3 control-label">Bonus</label>
						<div class="col-md-8">
							<input type="number" name="bonus" class="form-control" id="bonus">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_keahlian" class="col-md-3 control-label">Tunjangan Keahlian</label>
						<div class="col-md-8">
							<input type="number" name="tunj_keahlian" class="form-control" id="tunj_keahlian">
						</div>
					</div>

					<div class="form-group">
						<label for="lembur" class="col-md-3 control-label">Lembur</label>
						<div class="col-md-8">
							<input type="number" name="lembur" class="form-control" id="lembur">
						</div>
					</div>



				</div>

				<div class="modal-footer">
					<button type="submit" id="submit" class="btn btn-primary btn-save btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan Pegawai</button>
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>