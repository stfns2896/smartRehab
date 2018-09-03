<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="80x80" href="<?php echo base_url(); ?>assets/img/icons/icon_bnn_clean_80.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/icons/icon_bnn_clean_60.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome-all.min.css" />
    <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.standalone.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.css">
    <link async href='<?php echo base_url(); ?>/assets/css/material/material-icons.css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/css/jquery-confirm.min.css"></link>
</head>
<?php
    $tipe_user=$this->session->userdata('tipe');
?>
<body>
<div class="wrapper">
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">SmartRehab - Dashboard</a>
                </div>
                <div class="navbar">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notif-button">
                                    <span class="badge" id="notif-count"></span>
                                    <i class="ti-bell"></i>
                                    <p>Notifikasi</p>
                                    <b class="caret"></b>

                              </a>
                              <ul class="dropdown-menu" id="notif-messages"></ul>
                        </li>
                        <?php if ($this->session->userdata('tipe')=='0') {?>
                        <li>
                            <a data-toggle="modal" data-backdrop="static" href="#buat-akun">
                                <i class="ti-panel"></i>
                                <p>Tambah User</p>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                              <a data-toggle="modal" data-placement="auto" title="Ganti Password" data-backdrop="static" href="#ganti-password">
                                <i class="fas fa-key"></i>
                                <p>Ganti Password</p>
                              </a>
                        </li>
                        <li>
                            <a data-toggle="tooltip" data-placement="auto" title="Logout" href="#" onclick="logout()">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                              </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>