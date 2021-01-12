    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ubah Profil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		<form class="form-horizontal" method="post" action="<?= base_url('profil/ubah'); ?>" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
					<small class="text-danger"> * Tanpa Gelar</small>  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>
				
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Gelar Depan</label>
                  <div class="col-sm-3">
					<input type="text" class="form-control" id="gelarDepan" name="gelarDepan" placeholder="Gelar Depan" value="<?= $userDetail['gelarDepan']; ?>">
					<?= form_error('gelarDepan', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
					
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Gelar Belakang</label>
                  <div class="col-sm-3">
					<input type="text" class="form-control" id="gelarBelakang" name="gelarBelakang" placeholder="Gelar Belakang" value="<?= $userDetail['gelarBelakang']; ?>">
					<?= form_error('gelarBelakang', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-10">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= $userDetail['nik']; ?>">
					<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
					
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NBP</label>
                  <div class="col-sm-10">
					<input type="text" class="form-control" id="nbp" name="nbp" placeholder="Nomor Baku Pegawai" value="<?= $userDetail['nbp']; ?>">
					<?= form_error('nbp', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
				  <select class="form-control" id="agama" name="agama">
                    <option selected disabled value="">Silahkan Pilih</option>
                    <option value="Islam">Islam</option>
					<option value="kristen">kristen</option>
					<option value="budha">budha</option>
					<option value="hindu">hindu</option>
                  </select>
					<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
				  <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                    <option selected disabled value="">Silahkan Pilih</option>
                    <option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
                  </select>
					<?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-10">
					<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" value="<?= $userDetail['tempatLahir']; ?>">
					<?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

					
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglLahir" name="tglLahir" placeholder="Tanggal Lahir">
					<?= form_error('tglLahir', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Handphone</label>
                  <div class="col-sm-3">
					<input type="text" class="form-control" id="noHp" name="noHp" placeholder="No. Handphone" value="<?= $userDetail['noHp']; ?>">
					<?= form_error('noHp', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

					
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status Kepegawaian</label>
                  <div class="col-sm-10">
				  <select class="form-control" id="statusPegawai" name="statusPegawai">
                    <option selected disabled value="">Silahkan Pilih</option>
                    <option value="Karyawan Tetap">Karyawan Tetap</option>
					<option value="Karyawan Kontrak">Karyawan Kontrak</option>
					<option value="Karyawan Magang">Karyawan Magang</option>
                  </select>
					<?= form_error('statusPegawai', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
				  <select class="form-control" id="jabatan" name="jabatan">
                    <option selected disabled value="">Silahkan Pilih</option>
                    <option value="Staff">Staff</option>
					<option value="Staf Khusus">Staf Khusus</option>
					<option value="Kasubag">Kasubag</option>
					<option value="kabag">kabag</option>
					<option value="Ka. Biro">Ka. Biro</option>
					<option value="Ka. Unit">Ka. Unit</option>
					<option value="Ka. Lempaga">Ka. Lempaga</option>
					<option value="Ka. Pusat">Ka. Pusat</option>
                  </select>
					<?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>


				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-10">
									<select class="form-control select2" style="width: 100%;" id="unitKerja" name="unitKerja">
                    <option selected disabled value="">Silahkan Pilih</option>
									  <?php foreach ($unit as $ja) : ?>
                                <option value="<?= $ja['unitKerja']; ?>"><?= $ja['unitKerja']; ?></option>
                            <?php endforeach; ?>
									</select>
							
									<?= form_error('unitKerja', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat Rumah</label>
                  <div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah" value="<?= $userDetail['alamat']; ?>">
					<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
      </div>
      <!-- /.box -->
	</section>
