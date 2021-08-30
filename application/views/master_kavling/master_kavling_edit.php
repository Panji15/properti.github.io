

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

          <?php foreach ($kavling as $value) ?>
                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>EDIT KAVLING</b></h2>
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
                        <!-- <form id="form-edit" method="POST" action="<?= base_url(); ?>master_kavling/proses_edit/"> -->
                          <div class="card-body">
                          <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $value['id'] ?>">
                              <label for="exampleInputEmail1">Proyek</label>
                              <?= form_dropdown('proyek', $proyek, '', 'class="form-control select2" id="pekerja_id" required'); ?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kavling</label>
                              <input type="text" name="kavling" class="form-control" value="<?php echo $value['kavling'] ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status Pembangunan</label>
                              <?= form_dropdown('status', $status,'', 'class="form-control" required'); ?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Progress</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                                    $array_progress = array(
                                        $value['progress']    => $value['progress'] .'%',
                                        '0'   => '0 %',
                                        '10'  => '10 %',
                                        '20'  => '20 %',
                                        '30'  => '30 %',
                                        '40'  => '40 %',
                                        '50'  => '50 %',
                                        '60'  => '60 %',
                                        '70'  => '70 %',
                                        '80'  => '80 %',
                                        '90'  => '90 %',
                                        '100' => '100 %',
                              );
                              ?>
                              <?= form_dropdown('progress', $array_progress, $progress, 'class="form-control" required'); ?>
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_kavling'; ?>"> Kembali</a>
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
          url: '<?= base_url('master_kavling/proses_edit/'); ?>', //nama action script php sobat
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
                          window.location.href = "<?= base_url('master_kavling/'); ?>";
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