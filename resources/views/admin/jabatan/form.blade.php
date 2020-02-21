<div class="modal fade" id="form-jabatan" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
	<div class="modal-dialog modal-md" id="modal-dialog">
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
					<input type="hidden" id="id_jabatan" name="id_jabatan">
					<div class="form-group">
						<label for="nm_jabatan" class="col-md-3 control-label">Nama Jabatan :</label>
						<div class="col-md-8">
							<input type="text" name="nm_jabatan" class="form-control" id="nm_jabatan">
							<span class="help-block with-errors"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="gaji_pokok" class="col-md-3 control-label">Gaji Pokok</label>
						<div class="col-md-8">
							<input type="number" name="gaji_pokok" class="form-control" id="gaji_pokok">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_jabatan" class="col-md-3 control-label">Tunjangan Jabatan</label>
						<div class="col-md-8">
							<input type="number" name="tunj_jabatan" class="form-control" id="tunj_jabatan">
						</div>
					</div>


					<div class="form-group">
						<label for="uang_makan" class="col-md-3 control-label">Uang Makan </label>
						<div class="col-md-8">
							<input type="number" name="uang_makan" class="form-control" id="uang_makan">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_akomodasi" class="col-md-3 control-label">Tunjangan Akomodasi</label>
						<div class="col-md-8">
							<input type="number" name="tunj_akomodasi" class="form-control" id="tunj_akomodasi">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_pulsa" class="col-md-3 control-label">Tunjangan Pulsa</label>
						<div class="col-md-8">
							<input type="number" name="tunj_pulsa" class="form-control" id="tunj_pulsa">
						</div>
					</div>

					<div class="form-group">
						<label for="tunj_bbm" class="col-md-3 control-label">Tunjangan BBM</label>
						<div class="col-md-8">
							<input type="number" name="tunj_bbm" class="form-control" id="tunj_bbm">
						</div>
					</div>

					<div class="form-group">
						<label for="potongan" class="col-md-3 control-label">Potongan</label>
						<div class="col-md-8">
							<input type="number" name="potongan" class="form-control" id="potongan">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" id="submit" class="btn btn-primary btn-save btn-flat"><i class="fa fa-save"></i>&nbsp;Simpan Jenis</button>
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
				</div>
			</form>
		</div>
	</div>
</div>