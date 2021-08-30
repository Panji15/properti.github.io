<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=SITE_NAME;?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css');?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b></b><?=SITE_NAME;?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
      <!-- <form id="form-login" method=""> -->
        <div class="input-group mb-3">
          <input class="form-control" type="text" name="username" placeholder="Username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" type="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
      $('#form-login').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#submit');
        $.ajax({
          url: '<?= base_url(); ?>login/proseslog', //nama action script php sobat
          data: new FormData(this),
          type: 'POST',
          dataType: 'json',
          processData: false,
          contentType: false,
          beforeSend: function() {
            // btn.button('loading');
            btn.html('Loading...');
          },
          complete: function() {
            btn.html('Log in');
          },
          success: function(data) {
            console.log(data);
            $('.form-group').removeClass('has-error');
            $('.text-danger').remove();
            if (data['error']) {
              var text = '';
              for (i in data['error']) {
                $('input[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                $('input[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');
                $('select[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                $('select[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');
                $('textarea[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                $('textarea[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');

              }
            } else if (data['success']) {
                window.location.replace(data['redirect']);
            } else if(data['gagal_login']){
              swal("Gagal", "Periksa kembali username & password :(", "warning");
            }else{
              swal("Oops...", "Something went wrong :(", "error");
            }
          },
        });
      });
    });
  </script> -->
  
</body>
</html>
