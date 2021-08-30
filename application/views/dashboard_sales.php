<section class="content">
      <div class="">

      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="card-header">
              <h2 class="card-title"><b>SALES</b></h2>

                <div class="card-tools">
                </div>
              </div> -->

              <!-- <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <h5 class="description-header"><?php echo $jumlah_sales ?></h5>
                      <span class="description-text">Total Sales</span>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">Target Penjualan</span>
                    </div>
                  </div>
                  <div class="col-sm-4 col-6">
                    <div class="description-block">
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">Total Penjualan</span>
                    </div>
                  </div>

                </div>
              </div> -->

              <!-- /.card-header -->
              <div class="card-body">
              <h2 class="card-title"><b>SALES</b></h2>
              <div class="card-header">

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body p-0">
                <br>
                <table id="table_id" class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 10%"><center>Profil</center></th>
                            <th style="width: 30%">Nama</th>
                            <th>Divisi</th>
                            <th style="width: 15%"><center>Total Penjualan<center></th>
                            <th style="width: 10%"><center>Status</center></th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($karyawan as $value) {?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                              <center>
                              <ul class="list-inline">
                                <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../storage/user/avatar.png">
                                </li>
                              </ul>
                              </center>
                            </td>
                            <td><a><?php echo $value['nama'] ?></a></td>
                            <td><a><?php echo $value['nadiv'] ?></a>
                            </td>
                            <td class="project_progress" style="text-align:center">
                                <a><?php echo $value['jml_sales'] ?></a>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td class="">
                              <button type="button" class="btn btn-warning btn-xs" data-container="body" title="Lihat">
                                <a href="<?= base_url('sales/penjualan_per_sales/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
                                  <i class="fa fa-eye fa-xs" style="color:white"></i>
                                </a>
                              </button> 
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
              </div>

                <!-- <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- ./card-body -->

            </div>
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

