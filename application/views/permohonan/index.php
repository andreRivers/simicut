<section class="content">
            <?= $this->session->flashdata('message'); ?>
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
					<form role="form" action="<?= base_url('profil/ubahPassword'); ?>" method="POST" enctype="multipart/form-data">
					<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-line">

									<select class="form-control show-tick" name="form" onchange="location = this.value;">
										<option selected disabled value="">Pilih Form</option>
										<option value="<?= base_url('permohonan/cutiUmum'); ?>">Form Cuti Umum</option>
										<option value="<?= base_url('permohonan/cutiUmroh'); ?>">Form Cuti Umrah</option>
										<option value="<?= base_url('permohonan/cutiHamil'); ?>">Form Cuti Hamil</option>
									</select>
									
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.box-body -->

		</section>
