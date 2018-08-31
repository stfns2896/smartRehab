<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>Hasil Pendaftaran Pasien Rehabilitasi - BNN Kota Malang </title>
  
  <link rel="apple-touch-icon" sizes="80x80" href="<?php echo base_url('/assets/img/icons'); ?>/icon_bnn_clean_80.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('/assets/img/icons'); ?>/icon_bnn_clean_60.png" />
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url('/assets'); ?>/css/fontawesome-all.min.css" />
  
  <!-- CSS Files -->
  <!-- <link href="<?php echo base_url('assets/css'); ?>/bootstrap.min.css" rel="stylesheet" /> -->
  <link href="<?php echo base_url('assets/css'); ?>/material-kit.css?v=2.0.3" rel="stylesheet" />
  
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/css/'); ?>/halaman-sukses.css" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/bnnkotamalang/" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter fa-2x"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/bnn.kotamalang/" target="_blank" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square fa-2x"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/bnnkotamalang/" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram fa-2x"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo base_url('assets/img'); ?>/slide1.png')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Terimakasih</h1>
          <h4>Harap periksa pesan masuk email anda (<?php echo $userdata['email']; ?>) jika pemberitahuan yang kami berikan adalah sukses, kami menunggu anda disana. Jika tidak, anda dapat kembali dengan tombol back untuk melengkapi form anda. Tautan dibawah ini merupakan website resmi kami, atau anda ingin mengisi respon lain</h4>
          <br>
          <a href="https://bnnkotamalanguhuy.000webhostapp.com/" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-globe"></i> Kunjungi
          </a>
          <a href="<?php echo base_url('daftar/'); ?>" class="btn btn-info btn-raised btn-lg">
            <i class="far fa-edit"></i> Isi Form Lain
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Layanan</h2>
            <h5 class="description">Beberapa layanan pada BNN Kota Malang, untuk info lebih lanjut dapat mengunjungi link diatas</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="fa fa-flask"></i>
                </div>
                <h4 class="info-title">SKBN</h4>
                <p>SKBN adalah surat keterangan yang menerangkan bahwa seseorang itu bebas dari penggunaan zat - zat Narkoba.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="fa fa-bullhorn"></i>
                </div>
                <h4 class="info-title">Penyuluhan</h4>
                <p>Pelayanan yang kami berikan berupa sosialisasi kepada Masyarakat Kota Malang</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="fa fa-user-md"></i>
                </div>
                <h4 class="info-title">Rehabilitasi</h4>
                <p>Rehabilitasi narkoba merupakan salah satu upaya untuk menyelamatkan para pengguna dari belenggu narkoba</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <!-- <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://presentation.creative-tim.com">
              About Us
            </a>
          </li>
          <li>
            <a href="https://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div> -->
  </footer>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/'); ?>jquery.min.js"></script>
  <script src="<?php echo base_url('assets/js/'); ?>popper.min.js"></script>
  <script src="<?php echo base_url('assets/js/'); ?>bootstrap-material-design.min.js"></script>
  <!-- <script src="<?php //echo base_url('assets/js/'); ?>bootstrap.min.js"></script> -->
  <script src="<?php echo base_url('assets/js/'); ?>moment.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/'); ?>nouislider.min.js"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/'); ?>material-kit.js?v=2.0.3"></script>
</body>
</html>
<script>
  <?php if(is_null($this->session->flashdata('konfirmasi'))){ ?>
    alert("Pendaftaran Gagal");
  <?php }else{ ?>
    alert("<?php echo $this->session->flashdata('konfirmasi'); ?>");
  <?php } ?>
</script>
