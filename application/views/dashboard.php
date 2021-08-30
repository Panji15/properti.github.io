<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                    <div class="card-header">
                    <h2 class="card-title"><b>DASHBOARD</b></h2>
                    <br><hr>
                    
                    <div class="row">
                    <?php if ($this->session->userdata("level")==1) { ?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                            <div class="inner">
                                <p><b>Listing Proyek</b></p>

                                <h3><?php echo $jumlah_proyek ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <a href="<?php echo base_url('dashboard/dashboard_proyek'); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                            <div class="inner">
                                <p><b>Sales</b></p>
                                <h3><?php echo $jumlah_sales ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?php echo base_url('dashboard/dashboard_sales'); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                            <div class="inner">
                                <p><b>Keuangan</b></p><br><br>
                                <h3></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <a href="<?php echo base_url('dashboard/dashboard_keuangan'); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-secondary">
                            <div class="inner">
                                <p><b>Landbank</b></p><br><br>
                                <h3></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-house-user"></i>
                            </div>
                            <a href="" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6 col-6">
                            <div class="card">
                            <div class="card-header small-box bg-warning">
                                <h3 class="card-title"><i class="far fa-bell"></i> <b>Notification (<?php echo $jml_notification ?>)</b></h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus" style="color:white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times" style="color:white"></i>
                                </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                            <?php foreach ($notification as $value) {?>
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-info" style="margin-left: 10px;">
                                    <a href="" class="product-title" style="color:black"><?php echo $value['subject'] ?>
                                        <span class="badge badge-success float-right"><?php echo date('d-F-Y h:i:s', strtotime($value['date_added'])) ?></span></a>
                                    <span class="product-description">
                                    <?php echo $value['message'] ?>
                                    </span>
                                    </div>
                                </li>
                                </ul>
                            <?php } ?>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?php echo base_url('notification'); ?>" class="uppercase">See All Notification</a>
                            </div>
                            </div>
                        </div> -->
                    <?php } elseif ($this->session->userdata("level")==3) { ?>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                            <div class="inner">
                                <p><b>Penjualan</b></p>
                                <h3><?php echo $jml_konsumen; ?></h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <?php foreach ($karyawan as $sales) ?>
                            <a href="<?= base_url('sales/penjualan_per_sales/' . $sales['id'] . ''); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
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

