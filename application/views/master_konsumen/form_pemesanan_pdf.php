<?php
$cb = array(
  '1'   => 'Cash',
  '2'  => 'KPR',
);

// $pm = array(
//     '1'   => 'Booking Fee',
//     '2'   => 'Uang Muka',
//     '3'   => 'Angsuran',
//     '4'   => 'Cash',
// );
?>

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

          <?php foreach ($konsumen as $value) ?>
                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>EDIT PEMESANAN KAVLING</b></h2>
                <br><hr>


              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit Pemesanan Kavling <?php echo $value['nama_proyek'] ?>, <?php echo $value['kvl'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form_validasi" method="post" role="form">
                        <!-- <form id="form-edit" method="POST" action="<?= base_url(); ?>master_konsumen/proses_edit/"> -->
                          <div class="card-body">

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Lengkap</label>
                              <input type="hidden" name="id" class="form-control" value="<?php echo $value['id'] ?>" required>
                              <input type="text" name="nama" class="form-control" value="<?php echo $value['nama'] ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">No KTP/PASPOR/SIM</label>
                              <input type="text" name="identitas" class="form-control" value="<?php echo $value['identitas'] ?>" required>
                            </div>

                            <div class="form-group">
                              <label>Alamat KTP</label>
                              <textarea name="alamat" class="form-control" rows="3" placeholder="" required><?php echo $value['alamat'] ?></textarea>
                            </div>

                            <div class="form-group">
                              <label>Alamat Surat Menyurat</label>
                              <textarea name="alamat2" class="form-control" rows="3" placeholder="kosongkan jika alamat sama dengan KTP ..."><?php echo $value['alamat2'] ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Tempat, Tanggal Lahir</label>
                              <input type="text" name="tlahir" class="form-control" value="<?php echo $value['tlahir'] ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">No Hp</label>
                              <input type="text" name="kontak" class="form-control" value="<?php echo $value['kontak'] ?>" required>
                            </div>

                            <hr>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Harga Jual</label>
                              <input type="text" name="harga_jual" id="rupiah" class="form-control" value="<?php echo rupiah($value['harga_jual']) ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Diskon (%)</label>
                              <input type="text" name="diskon" id="" class="form-control" value="<?php echo $value['diskon'] ?>" >
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Uang Muka (DP)</label>
                              <input type="text" name="uang_muka" id="rupiah1" class="form-control" value="<?php echo rupiah($value['uang_muka']) ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Harga Pengikat</label>
                              <input type="text" name="harga_pengikat" id="rupiah2" class="form-control" value="<?php echo $value['harga_pengikat'] ?>" >
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Cara Bayar</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                                    $array_cara_bayar = array(
                                        $value['cara_bayar'] => $cb[$value['cara_bayar']],
                                        '1'   => 'Cash',
                                        '2'  => 'KPR',
                              );
                              ?>
                              <?= form_dropdown('cara_bayar', $array_cara_bayar, $cara_bayar, 'class="form-control" required'); ?>                            
                            </div>

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Pembayaran</label>
                              <input type="text" name="jumlah_pembayaran" id="rupiah" class="form-control" value="<?php echo rupiah($value['jumlah_pembayaran']) ?>" required>
                            </div> -->

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Kurang Pembayaran</label>
                              <input type="text" name="kurangan_pembayaran" id="rupiah1" class="form-control" value="<?php echo rupiah($value['kurangan_pembayaran']) ?>" required>
                            </div> -->

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Marketing</label>
                              <?= form_dropdown('nama_marketing', $marketing, '', 'class="form-control select2" id=""'); ?>
                            </div>

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">No Kontak</label>
                              <input type="text" name="kontak_marketing" class="form-control" value="<?php echo $value['kontak_marketing'] ?>" required>
                            </div></hr> -->

                            <div class="form-group">
                              <label for="exampleInputPassword1">Note</label>
                              <input type="text" name="note" class="form-control" value="<?php echo $value['note'] ?>" >
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_konsumen'; ?>"> Kembali</a>
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
          url: '<?= base_url('master_konsumen/proses_edit/'); ?>', //nama action script php sobat
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
                          window.location.href = "<?= base_url('master_konsumen/'); ?>";
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