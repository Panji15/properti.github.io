<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>PESAN KAVLING</b></h2>
                <br><hr>


              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Pemesanan Kavling</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-edit" method="POST" action="<?= base_url(); ?>master_konsumen/proses_save/">
                          <div class="card-body">
                            <div class="form-group">

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Lengkap</label>
                              <input type="hidden" name="id" class="form-control" value="" required>
                              <input type="text" name="nama" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">NIK</label>
                              <input type="text" name="identitas" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">No Hp</label>
                              <input type="text" name="kontak" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label>Alamat KTP</label>
                              <textarea name="alamat" class="form-control" rows="3" placeholder="" required></textarea>
                            </div>

                            <div class="form-group">
                              <label>Alamat Surat Menyurat</label>
                              <textarea name="alamat2" class="form-control" rows="3" placeholder="kosongkan jika alamat sama dengan KTP ..."></textarea>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Tempat, Tanggal Lahir</label>
                              <input type="text" name="tlahir" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Perumahan</label>
                              <?= form_dropdown('proyek', $proyek, '', 'class="form-control select2" id="proyek_id" required'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Kavling</label>
                              <select name="kavling" class="subkavling form-control select2" required>
                                <option value="0">--Pilih Kavling--</option>
                              </select>                            
                            </div>

                            <hr>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Harga Jual</label>
                              <input type="text" name="harga_jual" id="rupiah" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Diskon (%)</label>
                              <input type="text" name="diskon" id="" class="form-control" value="" >
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Harga Pengikat</label>
                              <input type="text" name="harga_pengikat" id="rupiah2" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Booking Fee</label>
                              <input type="text" name="booking_fee" id="rupiah1" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanda Jadi</label>
                              <input type="text" name="tanda_jadi" id="rupiah3" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Uang Muka (DP)</label>
                              <input type="text" name="uang_muka" id="rupiah4" class="form-control" value="" required>
                            </div>


                            <div class="form-group">
                              <label for="exampleInputPassword1">Cara Bayar</label>
                              <?= form_dropdown('cara_bayar', $pembayaran, '', 'class="form-control select2" id="" required'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Cicilan</label>
                              <input type="text" name="cicilan" id="rupiah5" class="form-control" value="" required>
                            </div>

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Tenggat Waktu Cicilan</label>
                              <input type="date" name="tenggat_waktu" id="rupiah5" class="form-control" value="" required>
                            </div> -->


                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Pembayaran</label>
                              <input type="text" name="jumlah_pembayaran" id="rupiah" class="form-control" value="" required>
                            </div> -->

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Kurang Pembayaran</label>
                              <input type="text" name="kurangan_pembayaran" id="rupiah1" class="form-control" value="" required>
                            </div> -->

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Marketing</label>
                              <?= form_dropdown('nama_marketing', $marketing, '', 'class="form-control select2" id="" required'); ?>
                              <!-- <input type="text" name="nama_marketing" class="form-control" value="" required> -->
                            </div>

                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">No Kontak</label>
                              <input type="text" name="kontak_marketing" class="form-control" value="" required>
                            </div></hr> -->

                            <div class="form-group">
                              <label for="exampleInputPassword1">Note</label>
                              <input type="text" name="note" class="form-control" value="" >
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

<!-- Select2 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>    <!-- Load file library jQuery melalui CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src='<?php echo base_url()?>admin-themes/AdminLTE-2.3.5/plugins/select2/select2.min.js'></script> -->
<script>


$(document).ready(function() {
        $('#proyek_id').change(function(){
            var id=$(this).val();
            $.ajax({
                url : '<?= base_url(); ?>master_konsumen/master_subkavling',
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '<option value="">--Pilih Kavling--</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id+'">'+data[i].kavling+'</option>';
                    }
                    $('.subkavling').html(html);
                     
                }
            });
        });
});

</script>
