<section class="content">


            <?= $this->session->flashdata('message'); ?>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Ubah Permohononan Form Cuti</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<form class="form-horizontal" method="post" action="<?= base_url('permohonan/ubahCutiGo'); ?>" enctype="multipart/form-data">
              <div class="box-body">
			  <input type="hidden"  class="form-control" id="id_cuti" name="id_cuti" value="<?=$ubahCuti['id_cuti']; ?>" required readonly>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$user['email']; ?>" required readonly>
					 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>

				
					
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglCuti" name="tglCuti" value="<?=$ubahCuti['tglCuti']; ?>" required>
				
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Selesai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglSelesaiCuti" name="tglSelesaiCuti" value="<?=$ubahCuti['tglSelesaiCuti']; ?>" required>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Masuk Kerja</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglMasuk" name="tglMasuk" value="<?=$ubahCuti['tglMasuk']; ?>" required>
                  </div>
				</div>
			
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Surat Izin Pimpinan Biro/fakultas/ Lembaga/Unit/Pusat</label>
                  <div class="col-sm-3">
					<input type="file" class="form-control" id="scan" name="scan" accept="image/gif, image/jpeg, image/png" required>
				  </div>
				  <small class="text-danger">- File JPG, JPEG, PNG Dan Ukuran Max 2 MB</small>
				</div>

				
					
                
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alasan Cuti</label>
                  <div class="col-sm-10">
					<textarea type="text" class="form-control" rows="5" id="alasan" name="alasan" placeholder="Alasan Cuti" required> </textarea>
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

