<section class="content">
  <div class="">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><b>DETAIL PENJUALAN SALES</b></h2><br><hr>

            <div class="card-tools">
            </div>

              <div class="row">
                <div class="col-12 table-responsive">
                <table id="" class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 10%"><center>Profil</center></th>
                            <th style="width: 30%">Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th style="width: 15%"><center>Total Penjualan<center></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1;
                      foreach ($karyawan as $value) ?>
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
                            <td><a><?php echo $value['najab'] ?></a>
                            <td><a><?php echo $value['nadiv'] ?></a>
                            </td>
                            <td class="project_progress" style="text-align:center">
                              <font size="5"><strong><?php echo $value['jml_sales'] ?></strong></font>
                                <!-- <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small>
                                    57% Complete
                                </small> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
              </div>

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#report" data-toggle="tab"><i class="far fa-file-alt"></i> <b>Report</b></a></li>
                      <li class="nav-item"><a class="nav-link" href="#penjualan" data-toggle="tab"><i class="fas fa-users"></i> <b>Penjualan</b></a></li>
                      <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="report">
                        <!-- Post -->
                        <!-- <div class="col-sm-4 invoice-col">
                          <address>
                          <strong>List Penjualan :</strong><br>
                          </address>
                        </div> -->

                        <!-- Table row -->
                        <div class="row">
                          <div class="col-12 table-responsive">
                            <table id="table_id" class="table table-striped" border="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Kunjungan</th>
                                  <th>Call</th>
                                  <th>Database</th>
                                  <th>Prospek</th>
                                  <th>Hot Prospek</th>
                                  <th>Closing</th>
                                </tr>
                              </thead>
                              <!-- <?php if ($konsumen==null) { ?>

                                <tbody>
                                  <tr>
                                    <td colspan="6"><center>Data tidak ditemukan...</center></td>
                                  </tr>
                                </tbody>

                              <?php } else { ?>

                                <tbody>
                                  <?php
                                  $i=1;
                                  foreach ($konsumen as $value) {?>
                                    <tr>
                                      <td><?php echo $i++ ?></td>
                                      <td><?php echo $value['nama_proyek'] ?></td>
                                      <td>Blok <?php echo $value['nkav'] ?></td>
                                      <td><?php echo $value['nama'] ?></td>
                                      <td><?php echo $value['ketstts'] ?></td>
                                      <td>
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar bg-success" style="width: <?php echo $value['progress'] ?>%"></div>
                                        </div>
                                        <span class="badge bg-success"><?php echo $value['progress'] ?>%</span>
                                      </td> 
                                    </tr>
                                  <?php } ?>
                                </tbody>

                              <?php } ?> -->
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.post -->
                      </div>

                      <div class="tab-pane" id="penjualan">
                        <!-- Post -->
                        <!-- <div class="col-sm-4 invoice-col">
                          <address>
                          <strong>List Penjualan :</strong><br>
                          </address>
                        </div> -->

                        <!-- Table row -->
                        <div class="row">
                          <div class="col-12 table-responsive">
                            <table id="penjualan_id" class="table table-striped" border="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Konsumen</th>
                                  <th>Kavling</th>
                                  <th>Proyek</th>
                                  <th>Status Pembangunan</th>
                                  <th>Progress</th>
                                  <th width="18%">Aksi</th>
                                </tr>
                              </thead>
                              <?php if ($konsumen==null) { ?>

                                <tbody>
                                  <tr>
                                    <td colspan="6"><center>Data tidak ditemukan...</center></td>
                                  </tr>
                                </tbody>

                              <?php } else { ?>

                                <tbody>
                                  <?php
                                  $i=1;
                                  foreach ($konsumen as $value) {?>
                                    <tr>
                                      <td><?php echo $i++ ?></td>
                                      <td><?php echo $value['nama'] ?></td>
                                      <td>Blok <?php echo $value['nkav'] ?></td>
                                      <td><?php echo $value['nama_proyek'] ?></td>
                                      <td><?php echo $value['ketstts'] ?></td>
                                      <td>
                                        <div class="progress progress-xs progress-striped active">
                                          <div class="progress-bar bg-success" style="width: <?php echo $value['progress'] ?>%"></div>
                                        </div>
                                        <span class="badge bg-success"><?php echo $value['progress'] ?>%</span>
                                      </td> 
                                      <td>
                                        <!-- <button type="button" class="btn btn-primary btn-xs" data-container="body" title="Edit" style="font-size:none;">
                                            <a href="<?= base_url('master_konsumen/master_konsumen_edit/' . $value['id'] . ''); ?>" class="btn-sm border-0" >
                                                <i class="fa fa-edit fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Delete">
                                            <a onclick="hapus(<?php echo $value['id'] ?>)" class="btn-sm  border-0">
                                                <i class="far fa-trash-alt fa-xs" style="color:white"></i>
                                            </a>
                                        </button> -->
                                        <button type="button" class="btn btn-success btn-xs" data-container="body" title="Cek Angsuran">
                                            <a href="<?= base_url('master_konsumen/pembayaran/' . $value['id'] . ''); ?>" class="btn-sm border-0">
                                                <i class="fas fa-clipboard-list fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-xs" data-container="body" title="Form Pembelian">
                                            <a href="<?= base_url('master_konsumen/form_pemesanan_pdf/' . $value['id'] . ''); ?>" class="btn-sm  border-0" target="_blank">
                                                <i class="fas fa-print fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                    </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>

                              <?php } ?>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.post -->                      
                      </div>

                      <!-- <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div> -->
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>



              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url('dashboard/dashboard_sales'); ?>" rel="noopener" class="btn btn-default"> Kembali </a>
                  <!-- <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print </a> -->
                  <!-- <button type="button" class="btn btn-default float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );

$(document).ready( function () {
    $('#penjualan_id').DataTable();
} );
</script>

