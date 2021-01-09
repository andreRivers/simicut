
<!DOCTYPE html>
<html>

<head>
    <title>SIMICUT UMSU</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginNew/'); ?>css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/'); ?>img/px.png">
</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_login'); ?>"></div>
    <?php if ($this->session->flashdata('flash_login')) : ?>

    <?php endif; ?>
    <img class="wave" src="<?= base_url('assets/loginNew/'); ?>img/wave.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url('assets/loginNew/'); ?>img/bg.png">
        </div>
        <div class="login-content">
            <form method="post" action="<?= base_url('auth/changepassword'); ?>">
                <img src="<?= base_url('assets/loginNew/'); ?>img/avatar.png">
				<p>Silahkan Masukan Email Anda untuk Pemulihan</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Password Baru</h5>
                        <input type="password" class="input" id="password1" name="password1" placeholder="Enter new password..." required>
                    </div>
                </div>

				<div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Ulangi Password Baru</h5>
                        <input type="password" class="input" id="password2" name="password2" placeholder="Enter new password..." required>
                    </div>
                </div>
                <input type="submit" class="btn" value="Change password">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/loginNew/'); ?>js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</body>

</html>
