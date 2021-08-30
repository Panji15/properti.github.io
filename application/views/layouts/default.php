<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=SITE_NAME;?> | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css');?>">

  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/summernote/summernote-bs4.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/jqvmap/jqvmap.min.css');?>">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/daterangepicker/daterangepicker.css');?>">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">



<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/plugins/summernote/summernote-bs4.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/plugins/jquery-knob/jquery.knob.min.js');?>"></script>
<!-- JQVMap -->
<script src="<?=base_url('assets/plugins/jqvmap/jquery.vmap.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js');?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/plugins/sparklines/sparkline.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/pages/dashboard.js');?>"></script>
<script src="<?=base_url('assets/dist/js/adminlte.min.js');?>"></script>

<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> -->

<!-- Select2 -->
<script src='<?php echo base_url()?>admin-themes/AdminLTE-2.3.5/plugins/select2/select2.min.js'></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <?php
      $jml_notification = $this->db->select('*')
                                  ->from('tb_message')
                                  ->where('date_deleted',null)
                                  ->where('status',null)
                                  ->get()
                                  ->num_rows();

      $notification = $this->db->select('*')
                                  ->from('tb_message')
                                  ->limit(5)
                                  ->where('date_deleted',null)
                                  ->where('status',null)
                                  ->order_by('id', 'desc')
                                  ->get()
                                  ->result_array();
      
      $hday=date('Y-m');

      $kons = $this->db->select('k.*, p.nama_proyek, kv.kavling as nkav, kv.status as stts, s.keterangan as ketstts, kv.progress, hp.date_added as da')
                                  ->from('tb_konsumen k')
                                  ->join('tb_proyek p','p.id=k.proyek')
                                  ->join('tb_kavling kv','kv.id=k.kavling')
                                  ->join('tb_status s','s.id=kv.status')
                                  ->join('tb_history_pembayaran hp','hp.konsumen=k.id')
                                  ->where('hp.date_deleted',null)
                                  ->where('k.date_deleted',null)
                                  // ->order_by('p.nama_proyek', 'asc')
                                  ->where('hp.pembayaran',3)
                                  ->order_by('hp.date_added', 'asc')
                                  ->group_by('hp.konsumen')
                                  ->get()
                                  ->result_array();
      foreach ($kons as $key => $value) {
      if (date('Y-m-d', strtotime($value['da']))<$hday) {
        $jml_angs = $this->db->select('count(id) as jml_angs')
                            ->from('tb_history_pembayaran')
                            ->where('date_deleted', NULL)
                            ->where('konsumen', $value['id'])
                            ->where('pembayaran',3)
                            ->get()
                            ->row_array();
                            $jml_angs = $jml_angs['jml_angs'];
                            @$data['jml']+=$value['jml_pembayaran'];
                    
                            $data_output[$key] = $value;
        
                            $idk=$value['id'];
        }
      }
                          // $data['jumlah_sales'] = $data_output;
      $konsumen=$data_output;
      

    ?>

    <?php foreach ($konsumen as $value) {
          
        $day=date('Y-m-d', strtotime($value['da']));

        $diff  = date_diff( date_create($day), date_create() );

        $berjalan=$diff->format('%m');
        $angsuran=$jml_angs;

          // if ($berjalan<$angsuran){
          //     $hasil="<b style='color:black'>Sudah Bayar</b>";
          // } elseif ($berjalan==$angsuran){
          //     $hasil="<b style='color:black'>Sudah Bayar</b>";
          // }

        if ($berjalan>$angsuran){
          $hasil=$angsuran;
        }
        
      }
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo @count($hasil); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"> Notifications</span>
          <div class="dropdown-divider"></div>
          
          <a href="<?php echo base_url('master_konsumen/master_konsumen_telat'); ?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <b> <?php echo @count($hasil); ?> Konsumen Belum Bayar Cicilan</b>
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <!-- <a href="<?php echo base_url('notification'); ?>" class="dropdown-item dropdown-footer">See All Notifications</a> -->
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Selamat Datang, <b><?php echo $this->session->userdata('nama'); ?> </b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
            <!-- Profile Image -->
            <!-- <div class="card card card-outline"> -->
              <div class="card-body box-profile">
                <div class="text-center">
                <!-- <img style="min-width:150px"
                src="" 
                class="table-avatar img-circle img-fluid" alt="avatar"> -->

                  <!-- <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture"> -->
                </div>
                <br>

                <!-- <h3 class="profile-username text-center">Nina Mcintire</h3> -->

                <!-- <p class="text-muted text-center">Software Engineer</p> -->
                <div class="card-footer">
                  <center>
                  <a class="btn btn-success btn-sm" href="" role="button"><i class="fas fa-edit"></i> Edit </a>
                  <a class="btn btn-danger btn-sm" href="<?php echo base_url('login/logout'); ?>" role="button"><i class="fas fa-sign-out-alt"></i> Log Out </a>
                  </center>
                </div>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
        </div>
      </li>


      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('login/logout'); ?>" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard/'); ?>" class="brand-link">
      <!-- <img src="<?=base_url('assets/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <center><strong><span class="brand-text"><?=SITE_NAME;?></span></strong></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

        <?php if ($this->session->userdata("level")==1) { ?> <!-- admin-->

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-id-badge"></i>              
            <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('master_user/'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('master_karyawan/'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>              
            <p>
                Manajemen Proyek
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('master_proyek/'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proyek</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('master_kavling/'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kavling</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>              
            <p>
                Manajemen Konsumen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('master_konsumen/'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konsumen</p>
                </a>
              </li>

            </ul>
          </li>

        <?php } ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Starter Page</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <?=$template['body']?>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
    

    var rupiah1 = document.getElementById('rupiah1');
		rupiah1.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah1.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah1     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah1 += separator + ribuan.join('.');
			}
 
			rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
			return prefix == undefined ? rupiah1 : (rupiah1 ? '' + rupiah1 : '');
		}

    var rupiah2 = document.getElementById('rupiah2');
		rupiah2.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah2.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah2     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah2 += separator + ribuan.join('.');
			}
 
			rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
			return prefix == undefined ? rupiah2 : (rupiah2 ? '' + rupiah2 : '');
		}

    var rupiah3 = document.getElementById('rupiah3');
		rupiah3.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah3.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah3     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah3 += separator + ribuan.join('.');
			}
 
			rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
			return prefix == undefined ? rupiah3 : (rupiah3 ? '' + rupiah3 : '');
		}

    var rupiah4 = document.getElementById('rupiah4');
		rupiah4.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah4.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah4     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah4 += separator + ribuan.join('.');
			}
 
			rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
			return prefix == undefined ? rupiah4 : (rupiah4 ? '' + rupiah4 : '');
		}

    var rupiah5 = document.getElementById('rupiah5');
		rupiah5.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			// rupiah.value = formatRupiah(this.value, 'Rp. ');
      rupiah5.value = formatRupiah(this.value, '');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah5     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah5 += separator + ribuan.join('.');
			}
 
			rupiah5 = split[1] != undefined ? rupiah5 + ',' + split[1] : rupiah5;
			return prefix == undefined ? rupiah5 : (rupiah5 ? '' + rupiah5 : '');
		}


	</script>

</body>
</html>
