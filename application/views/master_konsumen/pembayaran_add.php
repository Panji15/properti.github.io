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
                        <form id="form-edit" method="POST" action="<?= base_url(); ?>master_konsumen/proses_pembayaran_add/">
                          <div class="card-body">
                            <div class="form-group">

                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Konsumen</label>
                              <input type="hidden" name="id" class="form-control" value="<?php echo $value['idk']?>" required>
                              <input type="hidden" name="no_pembayaran" class="form-control" value="" required>
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
                                ''    => '--Pilih Metode Pembayaran--',
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
                              <?= form_dropdown('pembayaran', $byr, '', 'class="form-control select2" id="" required'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Angsuran Ke</label>
                              <input type="number" name="angsuran" class="form-control" value="" placeholder="total angsuran konsumen <?php echo $jml_angs ?>" >
                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Pembayaran</label>
                              <input type="text" name="jml_pembayaran" id="rupiah" class="form-control" value="<?php echo rupiah($value['cicilan'])?>" required>
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_konsumen/pembayaran'; ?>/<?php echo $value['idk']?>"> Kembali</a>
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
