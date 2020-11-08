<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini accent-teal layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-teal navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <button class="btn btn-danger btn-sm float-right">
            <i class="far fa-user-circle">&nbsp; Profil / Logout &nbsp;</i>
          </button>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url();?>assets/template/dist/img/avatar5.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $this->session->userdata('nama_user')?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-user"></i></span>
                </h3>
                <p class="text-sm">Level : <?php echo $this->session->userdata('nama_level')?></p>
                <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('index.php/login/logout'); ?>" class="dropdown-footer btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Logout?')">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->