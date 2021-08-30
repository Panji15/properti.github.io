<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                    <div class="card-header">
                    <h2 class="card-title"><b>DAFTAR PROYEK</b></h2>
                    <br><hr>

                        <div class="row">
                            <?php foreach ($proyek as $value) {?>

                            <div class="col-sm-3 flex-fill">
                                <div class="position-relative">
                                    <a href="<?= base_url('site_plan/site_plan_perkavling/' . $value['id'] . ''); ?>" style="color:black">
                                    <img  style="min-height: 180px; max-height: 180px;" src="<?= base_url(''.$value['img_proyek'].''); ?>" class="img-fluid" >

                                    <!-- <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-danger text-xl">
                                        Ribbon
                                        </div>
                                    </div> -->
                                    <div class="card-footer">
                                        <h6 class=""><center><strong><?php echo $value['nama_proyek'] ?></strong></center></h6>
                                    </div>
                                    </a>
                                </div>
                            </div>

                            <?php } ?>


                        </div>
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

