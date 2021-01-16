	<?php 
	$email = $this->session->userdata('email');
	if ($user['role_id'] == '2') {
		$cutiUmum = $this->db->query("SELECT * FROM user_detail where email='$email'")->row_array();
		$permohonan = $this->db->query("SELECT * FROM permohonan where email='$email'");
	}
	
	?>		
		<?php
				if ($user['role_id'] == '2') { ?>
		<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
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
          <div class="small-box bg-primary">
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
          <div class="small-box bg-primary">
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
          <div class="small-box bg-primary">
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
		
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Permohonanku</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Permohonan Cuti</th>

                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($cutiku as $cutku) : ?>
                <tr>
								<td><?= $i; ?></td>
				  <td> <a href="<?= base_url('profil/viewUser/'); ?><?= $cutku['email']; ?>"> <?= $cutku['nama']; ?> </a> - <?= $cutku['unitKerja']; ?><br>
				  <b>Lamanya Cuti : <?= $cutku['cutiDiambil']; ?> Hari | Tanggal Mulai Cuti : <?= date("d F Y", strtotime($cutku['tglCuti'])); ?> 
				  <br>Tanggal Selesai Cuti :<?= date("d F Y", strtotime($cutku['tglSelesaiCuti'])); ?> | Tanggal Masuk Kerja :<?= date("d F Y", strtotime($cutku['tglMasuk'])); ?> </b>
				  <br><small> Alasan :  <?= $cutku['alasan']; ?> 	</small>
				  <br> Status :
				  <?php
                    if ( $cutku['sts'] == 1) {
                        echo '<span class="label label-primary">Permohonan Terkirim</span>';
                    } elseif ( $cutku['sts'] == 2) {
                        echo '<span class="label label-info">Permohonan Sedang Diproses</span>';
                    } elseif ( $cutku['sts'] == 3) {
                        echo '<span class="label label-success">Permohonan Disetujui</span>';
                    } elseif ( $cutku['sts'] == 4) {
						echo '<span class="label label-warning">Permohonan Ditolak</span>';
					} elseif ( $cutku['sts'] == 5) {
                        echo '<span class="label label-danger">Membatalkan Permohonan</span>';
                    }
									?>  
					<br>
					<a href="<?= base_url('assets/scan/'); ?><?=  $cutku['scan'];  ?>" target="_blank"><span class="label label-danger">*Lampiran</span></a>
								

                  </td>
				</tr>
                
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
              </table>
				</div>
				<!-- /.row -->

			</div>

		</section>

<?php } ?>

<!-- ADMIN -->
<?php 
	$email = $this->session->userdata('email');
	if ($user['role_id'] == '1') {
		$date =date('Y'); 
		$cutiUmum = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Umum' AND sts=3 AND tglCuti like '%$date%' ");
		$cutiUmroh = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Umroh' AND sts=3 AND tglCuti like '%$date%' ");
		$cutiHamil = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Hamil' AND sts=3 AND tglCuti like '%$date%' ");
		$permohonan = $this->db->query("SELECT * FROM user");
		
		
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiUmum->num_rows();?></h3>

              <p>Permohonan Cuti Umum</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiUmroh->num_rows(); ?><sup style="font-size: 20px"></sup></h3>

              <p>Permohonan Cuti Umroh</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiHamil->num_rows(); ?></h3>

              <p> Permohonan Cuti Hamil</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $permohonan->num_rows(); ?></h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
				<!-- ./col -->
				
		</div>
		
		<div class="row">
			<div class="col-md-12">
          <div class="box box-primary">
					<div class="box-header with-border">
              <h3 class="box-title">Pegawai Sedang Cuti <span class="label label-danger">Hari Ini</span></h3>
						</div>
						<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Permohonan Cuti</th>

                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($cutiHariIni as $cut) : ?>
                <tr>
                  <td><?= $i; ?></td>
				  <td> <a href="<?= base_url('profil/viewUser/'); ?><?= $cut['email']; ?>"> <?= $cut['nama']; ?> </a> - <?= $cut['unitKerja']; ?><br>
				  <b>Lamanya Cuti : <?= $cut['cutiDiambil']; ?> Hari | Tanggal Mulai Cuti : <?= date("d F Y", strtotime($cut['tglCuti'])); ?> 
				  <br>Tanggal Selesai Cuti :<?= date("d F Y", strtotime($cut['tglSelesaiCuti'])); ?> | Tanggal Masuk Kerja :<?= date("d F Y", strtotime($cut['tglMasuk'])); ?> </b>
				  <br><small> Alasan :  <?= $cut['alasan']; ?> 	</small>
					</td>
				</tr>
                
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
              </table>
					</div>
		</div>

			</div>
		</div>


		</section>

<?php } ?>



<!-- PIMPINAN -->
<?php 
	$email = $this->session->userdata('email');
	if ($user['role_id'] == '3') {
		$date =date('Y'); 
		$cutiUmum = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Umum' AND sts=3 AND tglCuti like '%$date%' ");
		$cutiUmroh = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Umroh' AND sts=3 AND tglCuti like '%$date%' ");
		$cutiHamil = $this->db->query("SELECT * FROM permohonan where jenisCuti='Cuti Hamil' AND sts=3 AND tglCuti like '%$date%' ");
		$permohonan = $this->db->query("SELECT * FROM user");
		
		
	}
	
	?>
<?php
				if ($user['role_id'] == '3') { ?>
		<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiUmum->num_rows();?></h3>

              <p>Permohonan Cuti Umum</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiUmroh->num_rows(); ?><sup style="font-size: 20px"></sup></h3>

              <p>Permohonan Cuti Umroh</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $cutiHamil->num_rows(); ?></h3>

              <p> Permohonan Cuti Hamil</p>
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
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $permohonan->num_rows(); ?></h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
				<!-- ./col -->
				
		</div>
		
		<div class="row">
			<div class="col-md-12">
          <div class="box box-primary">
					<div class="box-header with-border">
              <h3 class="box-title">Pegawai Sedang Cuti <span class="label label-danger">Hari Ini</span></h3>
						</div>
						<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Permohonan Cuti</th>

                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($cutiHariIni as $cut) : ?>
                <tr>
                  <td><?= $i; ?></td>
				  <td> <a href="<?= base_url('profil/viewUser/'); ?><?= $cut['email']; ?>"> <?= $cut['nama']; ?> </a> - <?= $cut['unitKerja']; ?><br>
				  <b>Lamanya Cuti : <?= $cut['cutiDiambil']; ?> Hari | Tanggal Mulai Cuti : <?= date("d F Y", strtotime($cut['tglCuti'])); ?> 
				  <br>Tanggal Selesai Cuti :<?= date("d F Y", strtotime($cut['tglSelesaiCuti'])); ?> | Tanggal Masuk Kerja :<?= date("d F Y", strtotime($cut['tglMasuk'])); ?> </b>
				  <br><small> Alasan :  <?= $cut['alasan']; ?> 	</small>
					</td>
				</tr>
                
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
              </table>
					</div>
		</div>

			</div>
		</div>


		</section>

<?php } ?>

