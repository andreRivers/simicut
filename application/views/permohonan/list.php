<section class="content">
            <?= $this->session->flashdata('message'); ?>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">List Permohonan Cuti</h2>
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
                  <th>Tanggal Permohonan</th>
                  <th> <i class="fa fa-cog"></i> </th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($permohonan as $prm) : ?>
                <tr>
                  <td><?= $i; ?></td>
				  <td> <a href="<?= base_url('profil/viewUser/'); ?><?= $prm['email']; ?>"> <?= $prm['nama']; ?> </a> - <?= $prm['unitKerja']; ?><br>
				  <b>Lamanya Cuti : <?= $prm['cutiDiambil']; ?> Hari | Tanggal Mulai Cuti : <?= date("d F Y", strtotime($prm['tglCuti'])); ?> 
				  <br>Tanggal Selesai Cuti :<?= date("d F Y", strtotime($prm['tglSelesaiCuti'])); ?> | Tanggal Masuk Kerja :<?= date("d F Y", strtotime($prm['tglMasuk'])); ?> </b>
				  <br><small> Alasan :  <?= $prm['alasan']; ?> 
				  <br> Status :
				  <?php
                    if ( $prm['sts'] == 1) {
                        echo '<span class="badge badge-pill badge-info">Permohonan Terkirim</span>';
                    } elseif ( $prm['sts'] == 2) {
                        echo '<span class="badge badge-pill badge-warning">Permohonan Sedang Diproses</span>';
                    } elseif ( $prm['sts'] == 3) {
                        echo '<span class="badge badge-pill badge-success">Permohonan Disetujui</span>';
                    } elseif ( $prm['sts'] == 4) {
						echo '<span class="badge badge-pill badge-danger">Permohonan Ditolak</span>';
					} elseif ( $prm['sts'] == 5) {
                        echo '<span class="badge badge-pill badge-danger">Membatalkan Permohonan</span>';
                    }
									?>  
									</small>

                  </td>
                  <td> <?= date("d F Y", strtotime($prm['tglPengajuan'])); ?></td>
                  <td>
				  <div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                       <i class="fa fa-cog"></i> <span class="caret"></span>
                        </button>
						<ul class="dropdown-menu">
                         <li><a href="<?= base_url('profil/viewUser/');?><?= $prm['email']; ?>" >Lihat Profil</a></li>
							
							<?php
                            if ($user['role_id'] == '1') { ?>
                            <?php
                            if ($prm['sts'] =='1') { ?>
							 <li><a href="<?= base_url('permohonan/proses/');?><?= $prm['id_cuti']; ?>" >Proses</a></li>
							 <li><a href="<?= base_url('permohonan/tolak/');?><?= $prm['id_cuti']; ?>" >Tolak</a></li>
							<?php } ?>
							
							<?php } ?>

							<?php
                            if ($user['role_id'] == '2') { ?>
                            <?php
							if ($prm['sts'] =='1') { ?>
							 <li><a href="<?= base_url('permohonan/ubahCuti/');?><?= $prm['id_cuti']; ?>" >Ubah</a></li>
							 <li><a href="<?= base_url('permohonan/batal/');?><?= $prm['id_cuti']; ?>" >Batal</a></li>
							<?php } ?>
							
							<?php } ?>
							
								
							<?php
                            if ($user['role_id'] == '3') { ?>
                            <?php
                            if ($prm['sts'] =='2') { ?>
							 <li><a href="<?= base_url('permohonan/setujui/');?><?= $prm['id_cuti']; ?>" >Setujui</a></li>
							 <li><a href="<?= base_url('permohonan/tolak/');?><?= $prm['id_cuti']; ?>" >Tolak</a></li>
							<?php } ?>
							
                            <?php } ?>

                        
							</ul>
                             </div> 
                
				  </td>
                 
                </tr>
                
				</tbody>
				<?php $i++; ?>
				<?php endforeach; ?>
              </table>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.box-body -->

		</section>