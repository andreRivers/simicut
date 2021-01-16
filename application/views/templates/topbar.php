<?php 
	$email = $this->session->userdata('email');
	// ADMIN
	if ($user['role_id'] == '1') {
		$permohonan = $this->db->query("SELECT * FROM permohonan where sts=1");
	}  elseif ($user['role_id'] == '3') {
		$permohonan = $this->db->query("SELECT * FROM permohonan where sts=2");
	
	}
	
	?>

<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url('user'); ?>" class="navbar-brand"><b>SIMICUT</b> UMSU</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= base_url('user'); ?>"><i class="fa fa-home"></i> Beranda <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url('profil'); ?>"><i class="fa fa-user"></i> Profil</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Permohonan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
							<?php if ($user['role_id'] == '2') { ?>
                <li><a href="<?= base_url('permohonan'); ?>">Permohonan Cuti</a></li>
								<li><a href="#">Permohonan Izin Keluar</a></li>
								<?php } ?>
								<li><a href="<?= base_url('permohonan/listCuti'); ?>">List Permohonan Cuti</a></li>
								<?php if ($user['role_id'] == '1') { ?>
									<li><a href="<?= base_url('permohonan/viewAll'); ?>">Semua Permohonan Cuti</a></li>
				<?php } ?>
						
               
              </ul>
			</li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Pengaturan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
								<li><a href="<?= base_url('profil/ubahPassword'); ?>">Ubah Password</a></li>
								<?php if ($user['role_id'] == '2') { ?>
				<li><a href="#">Laporan cutiku</a></li>
				<li><a href="#">Laporan Izin Keluarku</a></li>
				<?php } ?>

				<?php if ($user['role_id'] == '1') { ?>
				<li><a href="<?= base_url('master/pengguna'); ?>">Manajemen Pengguna</a></li>
				<li><a href="<?= base_url('master/unit'); ?>">Manajemen Unit Kerja</a></li>
				<li><a href="<?= base_url('laporan/cuti'); ?>">Laporan Izin cuti</a></li>
				<?php } ?>

				<?php if ($user['role_id'] == '3') { ?>
				<li><a href="<?= base_url('laporan/cuti'); ?>">Laporan Izin cuti</a></li>
				<?php } ?> 
               
              </ul>
            </li>
          </ul>
       
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
						<?php 	if ($user['role_id'] == '1') { ?>
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="<?= base_url('permohonan/listCuti'); ?>">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning"><?= $permohonan->num_rows(); ?></span>
							</a>
							<?php } ?>

							<?php 	if ($user['role_id'] == '3') { ?>
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="<?= base_url('permohonan/listCuti'); ?>">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning"><?= $permohonan->num_rows(); ?></span>
							</a>
							<?php } ?>
    
            </li>
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('assets/img/'); ?><?= $user['image']; ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= $user['nama']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= base_url('assets/img/'); ?><?= $user['image']; ?>" class="img-circle" alt="User Image">

                  <p>
                  <?= $user['nama']; ?>
                    <small>  <?= $user['email']; ?></small>
                  </p>
                </li>
              
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('user/profil'); ?>" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
			Dashboard
          <small>Version 2</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">pages</a></li>
          <li class="active"><?= $title; ?></li>
        </ol>
			</section>
		

