<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Violette Clothing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- jQuery 2.1.4 -->
  <script src="<?=base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Violette</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Violette Clothing</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Violette Clothing - Lembang, Bandung
                  <small>since Nov. 2013</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Violette Clothing</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
		<li class=""><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-home"></i></i><span>Beranda</span></a></li>
		<li class="active treeview">
			  <a href="#">
				<i class="fa fa-edit"></i> <span>Pesanan Baru</span> <i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('admin/pesanan_baru')?>"><i class="fa fa-circle-o"></i> Violette</a></li>
				<li><a href="<?php echo base_url('admin/pesanan_baru_dropshipper')?>"><i class="fa fa-circle-o"></i> Dropshipper</a></li>
			  </ul>
        </li>
		<li class="active treeview">
			  <a href="#">
				<i class="fa fa-print"></i> <span>Cetak Label</span> <i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('admin/cetak_label')?>"><i class="fa fa-circle-o"></i> Pesanan Baru</a></li>
				<li><a href="<?php echo base_url('admin/cetak_label_tgl')?>"><i class="fa fa-circle-o"></i> Cari Pertanggal Pesan</a></li>
			  </ul>
        </li>
		<li class=""><a href="<?php echo base_url('admin/resi_baru')?>"><i class="fa fa-cart-arrow-down"></i></i><span>Input Resi</span></a></li>
		<li class=""><a href="<?php echo base_url('admin/kirim_resi')?>"><i class="fa fa-mail-forward"></i></i><span>Kirim Resi (SMS)</span></a></li>
		<li class="treeview">
			  <a href="#">
				<i class="fa fa-print"></i> <span>Data Dropshipper</span> <i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('admin/dropshipper_baru')?>"><i class="fa fa-circle-o"></i> Dropshipper Baru</a></li>
				<li><a href="<?php echo base_url('admin/hapus_dropshipper')?>"><i class="fa fa-circle-o"></i> Hapus Dropshipper</a></li>
			  </ul>
        </li>
		<li class=""><a href="<?php echo base_url('admin/barang_baru')?>"><i class="fa fa-plus"></i></i><span>Barang Baru</span></a></li>
		<li class=""><a href="<?php echo base_url('admin/hapus_barang')?>"><i class="fa fa-trash"></i></i><span>Hapus Barang</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
