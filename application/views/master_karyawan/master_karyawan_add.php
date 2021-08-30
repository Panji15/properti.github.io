

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>TAMBAH KARYAWAN</b></h2>
                <br><hr>

              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Tambah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-edit" method="POST" action="<?= base_url(); ?>master_karyawan/proses_save/" enctype="multipart/form-data">
                          <div class="card-body">
                            <div class="form-group">
 
                              <input type="file" name="img_user" />

                              <br /><br />

                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Karyawan</label>
                              <input type="text" name="nama" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">No Karyawan</label>
                              <input type="text" name="no_karyawan" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Jabatan</label>
                              <?= form_dropdown('jabatan', $jbt, '', 'class="form-control select2" id="jbt" required'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Divisi</label>
                              <?= form_dropdown('divisi', $dvs, '', 'class="form-control select2" id="dvs" required'); ?>
                            </div>

                            <div class="form-group">
                              <label>Alamat</label>
                              <textarea name="alamat" class="form-control" rows="3" placeholder="Tuliskan alamat anda .."></textarea>
                            </div>

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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );

$(document).ready(function() {
        $('#form-edit').on('submit', function(e) {
            e.preventDefault();
            var btn = $('#submit');
            $.ajax({
                url: '<?= base_url(); ?>master_proyek/proses_edit/', //nama action script php sobat
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

                        }
                    } else if (data['success']) {
                        swal("Success!", "Update data berhasil", "success")
                            .then((value) => {
                                window.location.reload();
                                // window.location.href = "<?= base_url('master_proyek/master_proyek_edit/' . $value['id'] . ''); ?>";
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

</script> -->
