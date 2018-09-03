<!DOCTYPE html>
<html lang="id">
<head>
	<title>SmartRehab</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/icons/icon_bnn_clean_80.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/util.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>assets/img/bnn_1.png" alt="Logo BNN">
				</div>
				<?php echo form_open('Masuk/login','class="login100-form validate-form"'); ?>
					<span class="login100-form-title">
						<h2>SmartRehab</h2>
                         <p class="text-center">
                        Sistem Informasi Data Pasien</p>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Masukkan Username Anda">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Masukkan password Anda">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<p><?php echo $this->session->flashdata('response'); ?></p>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Masuk
						</button>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Lupa
						</span>
						<a data-toggle="modal" class="txt2" href="#modal-lupaPassword">Username / Password?</a>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" data-toggle="modal" class="txt2" href="#modal-buatAkun">Buat Akun Anda</a>
					</div>
					<div class="text-center">
						atau</br>
						<a class="txt2" class="txt2" href="<?php echo base_url('/daftar'); ?>">Daftar Pasien Rehabilitasi</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="modal-lupaPassword" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Lupa Username atau Password?
                    </h5>
                </div>
                <div class="modal-body">
                    <p>
                        Anda dapat menghubungi administrator untuk melakukan reset password, tapi jika anda merasa password anda benar dan tetap tidak bisa masuk ke sistem, hubungi administrator secepatnya!
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Saya paham</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-buatAkun" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Anda belum terdaftar dalam sistem?
                    </h5>
                </div>
                <div class="modal-body">
                    <p>
                        Anda dapat menghubungi administrator untuk melakukan pembuatan akun, pembuatan akun biasanya cepat hanya sekitar 1 menit
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Saya paham</button>
                </div>
            </div>
        </div>
    </div>
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/tilt.jquery.min.js"></script>
	<script >$('.js-tilt').tilt({scale: 1.1})</script>
</body>
</html>