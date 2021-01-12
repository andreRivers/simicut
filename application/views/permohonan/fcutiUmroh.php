<section class="content">
           
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Permohononan Form Cuti</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-line">

									<select class="form-control show-tick" name="form" onchange="location = this.value;">
										<option selected disabled value="">Pilih Form Cuti</option>
										<option value="<?= base_url('permohonan/cutiUmum'); ?>">Form Cuti Umum</option>
										<option value="<?= base_url('permohonan/cutiUmroh'); ?>">Form Cuti Umrah</option>
										<option value="<?= base_url('permohonan/cutiHamil'); ?>">Form Cuti Hamil</option>
									</select>
									
								</div>
							</div>
						</div>
						
				</div>
			</div>


            <?= $this->session->flashdata('message'); ?>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Permohononan Form Cuti Umrah</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<form class="form-horizontal" method="post" action="<?= base_url('permohonan/cutiUmroh'); ?>" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$user['email']; ?>" required readonly>
					 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>
				
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Lamanya Cuti</label>
                  <div class="col-sm-2">
					<input type="number" class="form-control" id="cutiDiambil" name="cutiDiambil" placeholder="Lamanya cuti">
					<?= form_error('cutiDiambil', '<small class="text-danger">', '</small>'); ?>
				  </div>
				  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Hak Cuti Anda</label>
                  <div class="col-sm-2">
					<input type="number" class="form-control" id="stokCuti" name="cutiUmroh" value="<?= $detail['cutiUmroh']; ?>" readonly>
					<?= form_error('cutiUmroh', '<small class="text-danger">', '</small>'); ?>
				  </div>
				  
				  <label for="inputPassword3" class="col-sm-2 control-label">Sisa Hak Cuti Anda</label>
                  <div class="col-sm-2">
					<input type="number" class="form-control" id="sisaCuti" name="sisaCuti" readonly>
					<?= form_error('cutiUmum', '<small class="text-danger">', '</small>'); ?>
                  </div>
				  
				</div>
				
					
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglCuti" name="tglCuti">
					<?= form_error('tglCuti', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Selesai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglSelesaiCuti" name="tglSelesaiCuti">
					<?= form_error('tglSelesaiCuti', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Masuk Kerja</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglMasuk" name="tglMasuk">
					<?= form_error('tglMasuk', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
			
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Surat Izin Pimpinan Biro/fakultas/ Lembaga/Unit/Pusat</label>
                  <div class="col-sm-3">
					<input type="file" class="form-control" id="scan" name="scan" accept="image/gif, image/jpeg, image/png" required>
					<?= form_error('scan', '<small class="text-danger">', '</small>'); ?>
				  </div>
				  <small class="text-danger">- File JPG, JPEG, PNG Dan Ukuran Max 2 MB</small>
				</div>

				
					
                
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alasan Cuti</label>
                  <div class="col-sm-10">
					<textarea type="text" class="form-control" rows="5" id="alasan" name="alasan" placeholder="Alasan Cuti"> </textarea>
					<?= form_error('alasan', '<small class="text-danger">', '</small>'); ?>
                  </div>
				</div>
			
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"> <i class="fa fa-send"></i> Kirim Permohonan</button>
              </div>
              <!-- /.box-footer -->
            </form>
						
				</div>
			</div>
			<!-- /.box-body -->

		</section>

