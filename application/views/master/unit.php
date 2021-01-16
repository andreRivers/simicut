<section class="content">
           
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Manajemen Unit Kerja</h2>
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
                  <th>UnitKerja</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1; 
			    foreach ($unitKerja as $uk) : ?>
                <tr>
                  <td><?= $i; ?></td>
				  <td><?= $uk['unitKerja']; ?></td>
                  
                 
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
