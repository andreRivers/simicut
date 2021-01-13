<?php 
	$email = $this->session->userdata('email');
	if ($user['role_id'] == '1') {
		$cutiUmum = $this->db->query("SELECT * FROM user_detail where email='$email'")->row_array();
		$permohonan = $this->db->query("SELECT * FROM permohonan where email='$email'");
	}
	
	?>		
		<?php
				if ($user['role_id'] == '1') { ?>
		<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $cutiUmum['cutiUmum']; ?></h3>

              <p>Cuti Umumku</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $cutiUmum['cutiUmroh']; ?><sup style="font-size: 20px"></sup></h3>

              <p>Cuti Umroh</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $cutiUmum['cutiHamil']; ?></h3>

              <p>Cuti Hamil</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $permohonan->num_rows(); ?></h3>

              <p>Permohonan Cuti</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
	  </div>


			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Informasi</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<ul>
<li>Harap Melengkapi Profil Sebelum Membuat Permohonan</li>
<li>Harap Melengkapi dan upload file izin cuti pimpinan</li>
<li>Setiap Permohonan cuti Maksimal 6 Hari</li>
</ul>
<p>&nbsp;</p>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.box-body -->

		</section>

<?php } ?>
