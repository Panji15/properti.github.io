<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>TAMBAH KAVLING</b></h2>
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
                        <form id="form-edit" method="POST" action="<?= base_url(); ?>master_kavling/proses_save/">
                          <div class="card-body">
                            <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="">
                              <label for="exampleInputEmail1">Proyek</label>
                              <?= form_dropdown('proyek', $proyek, 'proyek', 'class="form-control select2" id="pekerja_id" required'); ?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kavling</label>
                              <input type="text" name="kavling" class="form-control" value="" placeholder="Contoh: Blok A1" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status Pembangunan</label>
                              <?= form_dropdown('status', $status,'', 'class="form-control" required'); ?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Progress</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                                    $array_progress = array(
                                        ''    => '--Pilih Progress--',
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
                            <!-- <div class="form-group">
                              <label for="exampleInputEmail1">Luas</label>
                              <input type="text" name="luas" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi Proyek</label>
                              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div> -->

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
<script src='<?php echo base_url()?>admin-themes/AdminLTE-2.3.5/plugins/select2/select2.min.js'></script>
<script>
$('.select2').select2({
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
</script>
