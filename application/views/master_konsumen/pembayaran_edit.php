<?php
$mp = array(
    '1'   => 'Cash',
    '2'   => 'Transfer',
);

$pm = array(
    '1'   => 'Booking Fee',
    '2'   => 'Uang Muka',
    '3'   => 'Angsuran',
    '4'   => 'Cash',
    '5'   => 'Pengikat',
);
?>

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>TAMBAH PEMBAYARAN</b></h2>
                <br><hr>


              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Pembayaran Angsuran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php foreach ($history as $value) ?>
                        <form id="form_validasi" method="post" role="form">
                        <!-- <form id="form-edit" method="POST" action="<?= base_url(); ?>master_konsumen/proses_pembayaran_add/"> -->
                          <div class="card-body">
                            <div class="form-group">

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Konsumen</label>
                              <input type="hidden" name="idhp" class="form-control" value="<?php echo $value['idhp']?>" required>
                              <input type="hidden" name="id" class="form-control" value="<?php echo $value['id']?>" required>
                              <!-- <input type="hidden" name="no_pembayaran" class="form-control" value="" required> -->
                              <input type="text" name="konsumen" class="form-control" value="<?php echo $value['nama']?>" readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Perumahan</label>
                              <input type="text" name="" class="form-control" value="<?php echo $value['nama_proyek']?>" readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Kavling Blok</label>
                              <input type="text" name="" class="form-control" value="<?php echo $value['kavling']?>" readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Metode Pembayaran</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                              $array_m_pembayaran = array(
                                $value['metode_pembayaran']  => $mp[$value['metode_pembayaran']],
                                '1'   => 'Cash',
                                '2'   => 'Transfer',
                                // '3'   => 'Angsuran',
                                // '4'   => 'Cash',
                                // '0'   => 'Booking Fee',
                                // '10'  => 'Uang Muka',
                              );
                              ?>
                              <?= form_dropdown('m_pembayaran', $array_m_pembayaran, $m_pembayaran, 'class="form-control" required'); ?>                            
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Pembayaran</label>                              
                              <?= form_dropdown('pembayaran', $byr, '', 'class="form-control select2" id="" readonly'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Angsuran Ke</label>
                              <input type="text" name="angsuran" class="form-control" value="<?php echo $value['angsuran']?>" placeholder="" readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Pembayaran</label>
                              <input type="text" name="jml_pembayaran" id="rupiah" class="form-control" value="<?php echo rupiah($value['jml_pembayaran'])?>" required>
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_konsumen/pembayaran'; ?>/<?php echo $value['idhp']?>"> Kembali</a>
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
          url: '<?= base_url('master_konsumen/proses_pembayaran_edit/'); ?>', //nama action script php sobat
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
                          window.location.href = "<?= base_url('master_konsumen/pembayaran'); ?>/<?php echo $value['idhp']?>";
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
