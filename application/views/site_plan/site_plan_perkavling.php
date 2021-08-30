<!-- <style type="text/css">
    .map {
        background-image: url(assets/images/plan/GU_site.jpg);
        background-repeat: no-repeat;
    }

			/* .heaven-on-earth {
				fill: yellow;
			} */
</style> -->
<section class="content">
  <div class="">
    <div class="row">
      <div class="col-12">
        <?php foreach ($proyek as $values) ?>

          <div class="card card-solid">
            <div class="card-header">
              <h2 class="card-title"><b>SITE PLAN - <?php echo $values['nama_proyek'] ?></b></h2>
              <br><hr>
              <!-- <div background-image="<?php echo base_url(); ?>assets/images/plan/GU_site.jpg"> -->

              <?php if ($values['site_plan']==null) {
                $site_plan="<p>Gambar belum tersedia</p>";
              } else {
                $site_plan=include $values['site_plan'];
              } ?>
              
              <?php echo $site_plan ?>


              <hr>
              <h3 class="card-title"><b>PROJECT DESCRIPTION</b></h3><br>

              <p><?php echo $values['deskripsi'] ?>. </p>
              <div class="description"></div>

              <p><b>Spesifikasi Bangunan :</b></p>
              <?php
              $i=1;
              foreach ($spesifikasi as $valx) {?>
                <tr>
                  <td><?php echo $valx['spesifikasi'] ?> :</td>
                  <td><?php echo $valx['detail'] ?></td><br>
                </tr>
              <?php } ?>
              <br>


              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title"><b>LIST PROJECT</b></h3>
                </div>
                <!-- /.card-header -->

                <!-- /.card-header -->
                <div class="container">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="table_id" class="table m-0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kavling</th>
                            <th>Proyek</th>
                            <th>Nama Konsumen</th>
                            <th>Status Pembangunan</th>
                            <th>Progress</th>
                            <th width="5px">View</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i=1;
                          foreach ($konsumen as $valx) {?>
                          <tr>
                            <td><?php echo $i++ ?></td>
                            <td>Blok <?php echo $valx['nkav'] ?></td>
                            <td><?php echo $valx['nama_proyek'] ?></td>
                            <td><?php echo $valx['nama'] ?></td>
                            <td><?php echo $valx['ketstts'] ?></td>
                            <td>
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-success" style="width: <?php echo $valx['progress'] ?>%"></div>
                              </div>
                                <span class="badge bg-success"><?php echo $valx['progress'] ?>%</span>
                            </td>
                            <td>      
                              <button type="button" class="btn btn-warning btn-xs" data-container="body" title="Lihat">
                                <a href="<?= base_url('site_plan/master_kavling_detail/' . $valx['kavling'] . ''); ?>" class="btn-sm  border-0">          
                                  <i class="fa fa-eye fa-xs" style="color:white"></i>
                                </a>
                              </button>                                   
                              <!-- <a href="<?= base_url('site_plan/master_kavling_detail/' . $valx['kavling'] . ''); ?>" class="btn  border-0"><i class="fa fa-eye"></i>           
                                <div class="ripple-container"></div>
                              </a>     -->
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  <!-- /.table-responsive -->
                  </div>
                <!-- /.card-footer -->
                </div>
            </div>
          </div>
      <!-- /.col -->
      </div>
    <!-- /.row -->
    </div>
  </div>
<!-- /.container-fluid -->
</section>



<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function go(id) {

      
      swal("Yakin, anda akan melihat kavling ini?",
      { 
        icon: "info",
        buttons: ["Batal", true],
      })
      .then((willDelete) => {
        if (willDelete) {
          // swal("Poof! Your imaginary file has been deleted!", {
            // icon: "success",
          // })
          // .then((value) => {
          // window.location.reload();
           window.location.href = "<?= base_url('site_plan/master_kavling_detail/'); ?>"+id;
        // });
        } else {
          // swal("Your imaginary file is safe!");
        }
      });
        

    }
</script>
