<!doctype html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="theme-color" content="#5671D4">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />

		<link rel="apple-touch-icon" sizes="80x80" href="<?php echo base_url('/assets/img/icons'); ?>/icon_bnn_clean_80.png">
		<link rel="icon" type="image/png" href="<?php echo base_url('/assets/img/icons'); ?>/icon_bnn_clean_60.png" />
		
		<title>Pendaftaran Calon Pasien Rehabilitasi - BNN Kota Malang</title>
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/material/material-icons.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/fontawesome-all.min.css" />
		<!-- CSS Files -->
		<link href="<?php echo base_url('/assets/css'); ?>/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url('/assets/css'); ?>/material-bootstrap-wizard.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url('/assets/css'); ?>/bootstrap-datepicker.standalone.min.css" />
		<link rel="stylesheet" href="<?php echo base_url('/assets/css'); ?>/bootstrap-select.css">
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="<?php echo base_url('/assets/css'); ?>/form-pasien.css" rel="stylesheet" />
		
	</head>
	<body>
		<?php
		$agama=$data['agama'];
		$provinsi=$data['provinsi'];
		$sumber_biaya=$data['sumber_biaya'];
		$sumber_pasien=$data['sumber_pasien'];
		$narkoba=$data['narkoba'];
		?>
		<div class="image-container set-full-height" style="background-image: url('<?php echo base_url('/assets/img'); ?>/slide2.png')">
			<!--   Creative Tim Branding   -->
			<a href="https://bnnkotamalanguhuy.000webhostapp.com/">
				<div class="logo-container">
					<div class="logo">
						<img src="<?php echo base_url('/assets/img/icons'); ?>/icon_bnn_clean_60.png">
					</div>
					<div class="brand">
						BNN Kota Malang
					</div>
				</div>
			</a>
			<!--   Big container   -->
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<!--      Wizard container        -->
						<div class="wizard-container">
							<div class="card wizard-card" data-color="blue" id="wizardProfile">
								<?php echo form_open('daftar/hasil'); ?>
								<div class="wizard-header">
									<h3 class="wizard-title">
									Form Pengisian Data Pribadi Calon Pasien
									</h3>
									<h4 class="wizard-title">BNN Kota Malang</h4>
								</div>
								<div class="wizard-navigation">
									<ul>
										<li><a href="#informasiDasar" data-toggle="tab">Informasi Dasar</a></li>
										<li><a href="#informasiDetail" data-toggle="tab">Informasi Detail</a></li>
										<li><a href="#riwayatPengguna" data-toggle="tab">Riwayat Pengguna</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane" id="informasiDasar">
										<div class="row">
											<h4 class="info-text">Informasi ini untuk keperluan pembuatan formulir</h4>
											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="<?php echo base_url('/assets/img'); ?>/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
														<input type="file" id="wizard-picture">
													</div>
													<h6>Choose Picture</h6>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Nama Lengkap </label>
														<input id="fullname" name="fullname" type="text" class="form-control">
													</div>
												</div>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">phone</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">No. Telepon </label>
														<input id="no_telp" name="no_telp" type="tel" class="form-control">
													</div>
												</div>
												<div class="input-group">
													<span class="input-group-addon">
														<i id="icon-gender" class="fa fa-2x fa-venus-mars"></i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Jenis Kelamin </label>
														<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
															<option value="" disabled selected></option>
															<option value="1">Laki-Laki</option>
															<option value="2">Perempuan</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Email </label>
														<input name="email" type="email" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-5 col-sm-offset-1 col-xs-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">cake</i>
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Tempat Lahir</label>
														<input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-xs-6">
												<div class="input-group">
													<div class="form-group label-floating">
														<label class="control-label">Tanggal Lahir</label>
														<input class="form-control" name="tgl_lahir" id="tgl_lahir" type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="-80y" data-date-end-date="-1y">
													</div>
												</div>
											</div>
											<div class="col-sm-7 col-sm-offset-1 col-xs-7">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">home</i>
													</span>
													<div class="form-group label-floating is-empty">
														<label class="control-label">Alamat </label>
														<input name="alamat" id="alamat" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-3 col-xs-5">
												<div class="form-group label-floating">
													<label class="control-label">Provinsi</label>
													<select class="form-control valid" name="provinsi" id="provinsi" aria-invalid="false">
														<option disabled="" selected=""></option>
														<?php foreach ($provinsi as $key) { ?>
														<option value="<?php echo $key['id_provinsi']; ?>"><?php echo $key['nama_provinsi']; ?></option>
														<?php } ?>
													</select>
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="informasiDetail">
										<h4 class="info-text"> Informasi Detail </h4>
										<div class="row">
											<div class="col-sm-10 col-sm-offset-1">
												<div class="col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">No. Identitas</label>
														<input class="form-control" name="no_identitas" id="no_identitas" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Agama</label>
														<select class="form-control" name="agama" id="agama">
															<option selected="" disabled=""></option>
															<?php foreach ($agama as $key) {?>
															<option value="<?php echo $key['id_agama']; ?>"><?php echo $key['nama_agama']; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Suku</label>
														<input class="form-control" name="suku" id="suku" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Pendidikan Terakhir</label>
														<select class="form-control" name="pend_terakhir" id="pend_terakhir">
															<option selected="" disabled=""></option>
															<option value="1">SD/Sederajat</option>
															<option value="2">SMP/Sederajat</option>
															<option value="3">SMA/Sederajat</option>
															<option value="4">S1/Sederajat</option>
															<option value="5">S2</option>
															<option value="6">S3</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Pekerjaan</label>
														<input class="form-control" type="text" name="pekerjaan" id="pekerjaan">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">No. Telepon Keluarga</label>
														<input class="form-control" name="telp_keluarga" id="telp_keluarga" type="text">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Tipe Identitas</label>
														<select class="form-control" name="tipe_identitas" id="tipe_identitas">
															<option selected="" disabled=""></option>
															<option value="1">Kartu Tanda Penduduk</option>
															<option value="2">SIM</option>
															<option value="3">Kartu Mahasiswa</option>
															<option value="4">Kartu Pelajar</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Golongan Darah</label>
														<select class="form-control" name="goldar" id="goldar">
															<option selected="" disabled=""></option>
															<option value="1">A</option>
															<option value="2">B</option>
															<option value="3">AB</option>
															<option value="4">O</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Status Menikah</label>
														<select name="menikah" id="menikah" class="form-control">
															<option selected="" disabled=""></option>
															<option value="0">Belum</option>
															<option value="1">Sudah</option>
															<option value="2">Janda/Duda</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Nama Pasangan</label>
														<input class="form-control" name="nama_pasangan" id="nama_pasangan" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Nama Ayah</label>
														<input class="form-control" name="nama_ayah" id="nama_ayah" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Nama Ibu</label>
														<input class="form-control" name="nama_ibu" id="nama_ibu" type="text">
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group label-floating">
														<label class="control-label">Alamat Keluarga</label>
														<textarea class="form-control" name="alamat_keluarga" id="alamat_keluarga"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="riwayatPengguna">
										<div class="row">
											<div class="col-sm-12">
												<h4 class="info-text">Riwayat Pengguna</h4>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Mulai Pakai</label>
														<input class="form-control" name="mulai_pakai" id="mulai_pakai" type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="-20y" data-date-end-date="d">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Cara Pakai</label>
														<input class="form-control" name="cara_pakai" id="cara_pakai" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Frekuensi</label>
														<input class="form-control" name="frekuensi" id="frekuensi" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Terakhir Pakai</label>
														<input class="form-control" name="terakhir_pakai" id="terakhir_pakai" type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="-20y" data-date-end-date="d">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Sumber Biaya</label>
														<select class="form-control" name="sumber_biaya" id="sumber_biaya">
															<option selected="" disabled=""></option>
															<?php foreach ($sumber_biaya as $key) {?>
															<option value="<?php echo $key['id_sumber_biaya']; ?>"><?php echo $key['keterangan'] ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Sumber Pasien</label>
														<select class="form-control" name="sumber_pasien" id="sumber_pasien">
															<option selected="" disabled=""></option>
															<?php foreach ($sumber_pasien as $key) {?>
															<option value="<?php echo $key['id_sumber_pasien']; ?>"><?php echo $key['keterangan']; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Jenis Narkoba</label>
														<select class="selectpicker" name="jenis_narkoba[]" id="jenis_narkoba[]" data-style="btn-danger" data-title="Jenis Narkoba" data-live-search="true" multiple>
															<?php foreach($narkoba as $key){ ?>
															<option value="<?php echo $key['id_jenis_narkoba']; ?>"><?php echo $key['nama_narkoba']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group label-floating">
														<label class="control-label">Pernah Rehabilitasi</label>
														<select name="rehabilitasi" id="rehabilitasi" class="form-control">
															<option selected="" disabled=""></option>
															<option value="1">Pernah</option>
															<option value="0">Belum</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Tempat Rehabilitasi</label>
														<input class="form-control" name="tempat_rehab" id="tempat_rehab" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">No. Rekam Medis</label>
														<input class="form-control" name="no_rekam_medis" id="no_rekam_medis" type="text">
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Status Rawat</label>
														<select name="rawat" id="rawat" class="form-control">
															<option selected="" disabled=""></option>
															<option value="1">Jalan</option>
															<option value="2">Inap</option>
														</select>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Lama Rawat</label>
														<input class="form-control" name="lama_rawat" id="lama_rawat" type="text">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="wizard-footer">
									<div class="pull-right">
										<input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
										<!--  -->
										<input type='submit' id="btn_selesai" style="visibility: hidden" class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish'/>
									</div>
									<div class="pull-left">
										<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
						</div> <!-- wizard container -->
					</div>
					</div><!-- end row -->
					</div> <!--  big container -->
					<div class="footer">
						<div class="container text-center">
							
						</div>
					</div>
				</div>
			</body>
			<!--   Core JS Files   -->
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<script src="<?php echo base_url('/assets/js'); ?>/jquery-2.2.4.min.js" type="text/javascript"></script>
			<script src="<?php echo base_url('/assets/js'); ?>/bootstrap.min.js" type="text/javascript"></script>
			<script src="<?php echo base_url('/assets/js'); ?>/jquery.bootstrap.js" type="text/javascript"></script>
			<!--  Plugin for the Wizard -->
			<script src="<?php echo base_url('/assets/js'); ?>/material-bootstrap-wizard.js"></script>
			<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
			<script src="<?php echo base_url('/assets/js'); ?>/jquery.validate.js"></script>
			<script src="<?php echo base_url('/assets/js'); ?>/bootstrap-datepicker.min.js"></script>
			<script src="<?php echo base_url('/assets/js'); ?>/bootstrap-select.min.js"></script>
			<script>
			$("#jenis_kelamin").change(function(){
				if ($('#jenis_kelamin').val()=="2") {
					$('#icon-gender').removeClass('fa-venus-mars');
					$('#icon-gender').removeClass('fa-mars');
					$('#icon-gender').addClass('fa-venus');
				}else if($('#jenis_kelamin').val()=="1"){
					$('#icon-gender').removeClass('fa-venus-mars');
					$('#icon-gender').removeClass('fa-venus');
					$('#icon-gender').addClass('fa-mars');
				}
			});
			$("#rehabilitasi").change(function(){
				if ($('#rehabilitasi').val()=="0") {
					$('#tempat_rehab').attr('disabled',"");
					$('#rawat').attr('disabled',"");
					$('#lama_rawat').attr('disabled',"");
					$('#no_rekam_medis').attr('disabled',"");
				}else if($('#rehabilitasi').val()=="1"){
					$('#tempat_rehab').removeAttr('disabled');
					$('#rawat').removeAttr('disabled');
					$('#lama_rawat').removeAttr('disabled');
					$('#no_rekam_medis').removeAttr('disabled');
				}
			});
			$("#menikah").change(function(){
				if ($('#menikah').val()=="0") {
					$('#nama_pasangan').attr('disabled',"");
				}else if($('#menikah').val()=="1"){
					$('#nama_pasangan').removeAttr('disabled');
				}
			});
			</script>
		</html>