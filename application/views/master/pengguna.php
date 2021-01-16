<section class="content">
           
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Manajemen Pengguna</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createUser"><i class="fa fa-plus"></i> Tambah</button>
					<br>
					<br>
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
				  <th>Akses</th>
				  <th>Status</th>
                  <th> <i class="fa fa-cog"></i> </th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($pengguna as $pengg) : ?>
                <tr>
                  <td><?= $i; ?></td>
				  <td> <a href="<?= base_url('profil/viewUser/'); ?><?= $pengg['email']; ?>"> <?= $pengg['nama']; ?></a></td>
                  <td> <?= $pengg['email']; ?></td>
				  <td>
				  <?php
                    if ( $pengg['role_id'] == 1) {
                        echo '<span class="label label-primary">Super Admin</span>';
                    } elseif ( $pengg['role_id'] == 2) {
                        echo '<span class="label label-info">Pengguna</span>';
                    } elseif ( $pengg['role_id'] == 3) {
                        echo '<span class="label label-success">Pimpinan</span>';
                   
                    }
									?>  
				  </td>
				  <td>
				  <?php
                    if ( $pengg['is_active'] == 1) {
                        echo '<span class="label label-success">Aktif</span>';
                    } elseif ( $pengg['is_active'] == 2) {
                        echo '<span class="label label-danger">Non Aktif</span>';
                  
                    }
									?>  
				  </td>
                  <td>
				  <div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                       <i class="fa fa-cog"></i> <span class="caret"></span>
                        </button>
						<ul class="dropdown-menu">
                         <li><a href="<?= base_url('profil/viewUser/');?><?= $pengg['email']; ?>">Lihat Profil</a></li>
						 <li><a href="<?= base_url('master/editPengguna/');?><?= $pengg['email']; ?>">Ubah Data</a></li>
						 <li><a href="<?= base_url('master/resetPassword/');?><?= $pengg['email']; ?>">Reset Password</a></li>
						 <?php
                    	if ( $pengg['is_active'] == 1) { ?>
						 <li><a href="<?= base_url('master/nonAktif/');?><?= $pengg['email']; ?>">Non Aktif</a></li>
						 <?php } else { ?>
							<li><a href="<?= base_url('master/aktif/');?><?= $pengg['email']; ?>">Aktif</a></li>
						 <?php } ?>
						
							</ul>
                             </div> 
                
				  </td>
                 
                </tr>
                
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
              </table>
					
					</div>

						
				</div>
			</div>
</section>

<div class="modal fade" id="createUser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Tambah Pegawai</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" method="post" action="<?= base_url('master/tambahPengguna'); ?>" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email"  required>
					 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>

				
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
					 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
				  </div>
				</div>
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fa fa-save"></i> Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> Close</button>
			</div>
		</div>
	</form>
		
    </div>
  </div>
