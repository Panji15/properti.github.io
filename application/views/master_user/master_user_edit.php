<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

          <?php foreach ($user as $value) ?>
                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>EDIT USER</b></h2>
                <br><hr>

              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form_validasi" method="post" role="form">
                        <!-- <form id="form-edit" method="POST" action="<?= base_url(); ?>master_user/proses_edit/" enctype="multipart/form-data"> -->
                          <div class="card-body">
                            <!-- <div class="form-group">
                              <img src="<?= base_url(''.$value['img_user'].''); ?>" alt="Photo 3" class="img-fluid" width="50%">
                              <br><br>
                              <input type="file" name="img_user" />
                              <br><br>
                            </div> -->
                            <div class="form-group">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $value['id'] ?>">
                              <label for="exampleInputEmail1">Nama User</label>
                              <input type="text" name="" class="form-control" value="<?php echo $value['name'] ?>" readonly>
                              <input type="hidden" name="nama" class="form-control" value="<?php echo $value['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Username</label>
                              <input type="text" name="username" class="form-control" value="<?php echo $value['username'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Level Akses</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                                    $array_level = array(
                                        $value['level']    => $value['level'],
                                        '1'   => 'SuperAdmin / Admin',
                                        '2'   => 'Mitra',
                                        '3'   => 'Marketing',
                              );
                              ?>
                              <?= form_dropdown('level', $array_level, $level, 'class="form-control" required'); ?>
                            </div>

                            <!-- <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="text" name="password" class="form-control" value="<?php echo $value['password'] ?>" readonly>
                            </div> -->


                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_user'; ?>"> Kembali</a>
                            <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>



              <!-- /.card-body -->
                    </div>
                </div>


              <!-- /.card-body -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('#form_validasi').on('submit', function(e) {
      e.preventDefault();
      var btn = $('#submit');
      $.ajax({
          url: '<?= base_url('master_user/proses_edit/'); ?>', //nama action script php sobat
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
              btn.html('Submit');
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

                      text += data['error'][i] + '\n';

                  }
                  swal("Oops...", text, "error");
              } else if (data['success']) {
                  swal("Success!", "Data berhasil diupdate", "success")
                      .then((value) => {
                          // window.location.reload();
                          window.location.href = "<?= base_url('master_user/'); ?>";
                      });
              } else {
                  swal("Oops...", "Something went wrong :(", "error");
              }
          },
          error: function(data) {
              swal("Oops...", "Something went wrong :(", "error");
          }
      });
  });
});
</script>