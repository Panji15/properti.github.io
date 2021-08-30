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


                <div class="card card-solid">
                    <div class="card-body">
                    <h4 class="">SITE PLAN GRAN URBANO</h4><hr>
                    <!-- <div background-image="<?php echo base_url(); ?>assets/images/plan/GU_site.jpg"> -->
                      <?php include'assets/images/plan/GU_site.html'; ?>
                    <!-- </div> -->

<div class="row">
    <div class="col-lg-12">
        <!-- Map card -->
        <div class="card">
            <!-- <div id="map" class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Gran Urbano, Jl.Kartowimangun Tl.Betutu
                </h3>
            </div> -->


              
              <!-- <object>
              <img src="assets/images/plan/GU_site.svg" alt="Photo 3" class="img-fluid">
              </object> -->
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<h3 class="card-title">Project Description</h3><br><hr>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>

            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">List Project</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
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
                      <th>Nama Konsumen</th>
                      <th>Kavling</th>
                      <th>Proyek</th>
                      <th>Status Pembangunan</th>
                    </tr>
                    </thead>
                    <?php
                    $i=1;
                    foreach ($konsumen as $value) {?>
                    <tbody>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $value['nama'] ?></td>
                      <td><?php echo $value['nkav'] ?></td>
                      <td><?php echo $value['nama_proyek'] ?></td>
                      <td><?php echo $value['ketstts'] ?></td>
                    </tr>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-footer -->
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

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>