<section class="content">


            <?= $this->session->flashdata('message'); ?>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Penolakan Permohononan Form Cuti</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<form class="form-horizontal" method="post" action="<?= base_url('pimpinan/permohonan/tolakGo'); ?>" enctype="multipart/form-data">
              <div class="box-body">
			  <input type="hidden"  class="form-control" id="id_cuti" name="id_cuti" value="<?=$batal['id_cuti']; ?>" required readonly>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?=$batal['email']; ?>" required readonly>
					 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>

				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Jenis Cuti</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="jenisCuti" name="jenisCuti" value="<?=$batal['jenisCuti']; ?>" required readonly>
						<?= form_error('jenisCuti', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lamanya Cuti</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="cutiDiambil" name="cutiDiambil" value="<?=$batal['cutiDiambil']; ?>" required readonly>
					 <?= form_error('cutiDiambil', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglCuti" name="tglCuti" value="<?=$batal['tglCuti']; ?>" required readonly>
				
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Selesai Cuti</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglSelesaiCuti" name="tglSelesaiCuti" value="<?=$batal['tglSelesaiCuti']; ?>" required readonly>
                  </div>
				</div>

				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Masuk Kerja</label>
                  <div class="col-sm-3">
					<input type="date" class="form-control" id="tglMasuk" name="tglMasuk" value="<?=$batal['tglMasuk']; ?>" required readonly>
                  </div>
				</div>

                
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pesan Penolakan</label>
                  <div class="col-sm-10">
					<textarea type="text" class="form-control" rows="5" id="pesan" name="pesan" required> </textarea>
                  </div>
				</div>
			
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"> <i class="fa fa-save"></i> Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
						
				</div>
			</div>
			<!-- /.box-body -->

		</section>

