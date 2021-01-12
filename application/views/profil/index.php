    <!-- Main content -->
    <section class="content">
		<?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/'); ?><?= $user['image']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

              <p class="text-muted text-center"><?= $user['email']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?= $userDetail['statusPegawai']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right"><?= $userDetail['jabatan']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Unit Kerja</b> <a class="pull-right"><?= $userDetail['unitKerja']; ?></a>
                </li>
              </ul>

			  <a href="<?= base_url('profil/ubah'); ?>" class="btn btn-primary btn-block"><b> <i class="fa fa-cog"></i> Ubah Profil</b></a>
			  <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal"><b> <i class="fa fa-upload"></i> Upload Foto</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">
				<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nama Lengkap</th>
      <th scope="col"><?= $userDetail['gelarDepan']; ?> <?= $user['nama']; ?>, <?= $userDetail['gelarBelakang']; ?> </th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td>Nomor Induk Pegawai</td>
      <td><?= $userDetail['nbp']; ?></td>
    </tr>
  <tr>
      <td>Nomor Baku Pegawai</td>
      <td><?= $userDetail['nbp']; ?></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><?= $userDetail['agama']; ?></td>
    </tr>
    <tr>
      <td>Tempat/ Tanggal Lahir</td>
      <td><?= $userDetail['tempatLahir']; ?>/ <?= $userDetail['tglLahir']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><?= $userDetail['jenisKelamin']; ?></td>
	</tr>
	
	<tr>
      <td>No. Hp</td>
      <td><?= $userDetail['noHp']; ?></td>
	</tr>
		
	<tr>
      <td>Email</td>
      <td><?= $userDetail['email']; ?></td>
	</tr>
	
	<tr>
      <td>Alamat</td>
      <td><?= $userDetail['alamat']; ?></td>
    </tr>
  </tbody>
</table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
</div>

 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Upload Foto</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
	    	<form action="<?= base_url('profil/upload'); ?>" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label for="email">Upload Foto:</label>
       <input type="file" class="form-control" id="image" placeholder="Upload Photo" name="image" accept="image/gif, image/jpeg, image/png" required>
   
     	</div>
	
	<!-- Modal footer -->
	<div class="modal-footer">
		<button type="submit" class="btn btn-danger">Upload</button>
	</div>
</form>
        
      </div>
    </div>
  </div>
