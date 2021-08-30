<?php
$m_pembayaran = array(
    '' => '',
    '1'   => 'Cash',
    '2'   => 'Transfer',
);

$pembayaran = array(
    '1'   => 'Booking Fee',
    '2'   => 'Uang Muka',
    '3'   => 'Angsuran',
    '4'   => 'Cash',
);
?>

<section class="content">
      <div class="">


        <div class="row">
          <div class="col-12">
            <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>ANGSURAN PEMBAYARAN</b></h2>
                <br><hr>
                
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="" class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 15%">Nama</th>
                                    <th>Kavling</th>
                                    <th>Perumahan</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Kurang Pembayaran</th>
                                    <th style="width: 15%"><center>Total Angsuran<center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($konsumen as $value) ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td>Blok <?php echo $value['nkav'] ?></td>
                                    <td><?php echo $value['nama_proyek'] ?></td>
                                    <td><font size="5">Rp <?php
                                    $value['harga_jual'];
                                    $dis = $value['harga_jual']-($value['harga_jual']/100*$value['diskon']);
                                    echo rupiah($value['harga_jual']) ?></font></td>
                                    <td><font size="5"><?php echo $value['diskon'] ?> %</font></td>
                                    <td><font size="5">Rp
                                        <?php
                                        error_reporting(E_ALL & ~E_NOTICE);
                                        if ($total_angsuran == null) {
                                            $ta = 0;
                                        } else {
                                            $ta = $total_angsuran;
                                        } 
                                        ?>

                                        <?php $jp = $value['harga_jual'];
                                              $total = $dis-$ta;
                                              echo rupiah($total) ?>
                                    </font></td>
                                    </td>
                                    <td class="project_progress" style="text-align:center">
                                    <font size="5"><strong><?php echo $value['jml_angs'] ?></strong></font>
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
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-handshake"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Harga Pengikat</span>
                            <?php foreach ($history as $value) { ?>
                            <?php if ($value['pembayaran']==6) {?>
                                <span class="info-box-number">Rp <?php echo rupiah($value['jml_pembayaran']) ?></span>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-handshake"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Booking Fee</span>
                            <?php foreach ($history as $value) { ?>
                            <?php if ($value['pembayaran']==1) {?>
                                <span class="info-box-number">Rp <?php echo rupiah($value['jml_pembayaran']) ?></span>
                            <?php } ?>
                            <?php } ?>                        
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-handshake"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tanda Jadi</span>
                            <?php foreach ($history as $value) { ?>
                            <?php if ($value['pembayaran']==5) {?>
                                <span class="info-box-number">Rp <?php echo rupiah($value['jml_pembayaran']) ?></span>
                            <?php } ?>
                            <?php } ?>                        
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-handshake"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Uang Muka/DP</span>
                            <?php foreach ($history as $value) { ?>
                            <?php if ($value['pembayaran']==2) {?>
                                <span class="info-box-number">Rp <?php echo rupiah($value['jml_pembayaran']) ?></span>
                            <?php } ?>
                            <?php } ?>                        
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_konsumen/'; ?>"> Kembali</a>
                    <!-- <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button> -->
                </div>
                <hr>

                    <div class="card">
                      <div class="card-header">
                        <!-- <h3 class="card-title">DataTable with default features</h3> -->
                        <?php foreach ($konsumen as $vals) ?>
                        <a class="btn btn-primary btn-sm" href="<?= base_url('master_konsumen/pembayaran_add/' . $vals['id'] . ''); ?>"><i class="fas fa-plus"></i> Tambah Angsuran</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="container">
                      <br>
                        <table id="table_id" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>No Pembayaran</th> -->
                                    <th>Jenis Pembayaran</th>
                                    <th>Angsuran Ke</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <?php if ($history==null) { ?>

                            <tbody>
                            <tr>
                                <td colspan="6"><center>Data tidak ditemukan...</center></td>
                            </tr>
                            </tbody>

                            <?php } else { ?>

                            <tbody>
                            <?php
                            $i=1;
                            foreach ($history as $value) {?>
                            <?php if ($value['pembayaran']==3) {?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <!-- <td><?php echo $value['no_pembayaran'] ?></td> -->
                                    <td><?php echo $value['keterangan'] ?></td>
                                    <td><?php echo $value['angsuran'] ?></td>
                                    <td><?php echo $m_pembayaran[$value['metode_pembayaran']] ?></td>
                                    <td><?php echo rupiah($value['jml_pembayaran']) ?></td>
                                    <td><?php echo date('d-F-Y',strtotime($value['date_added'])) ?></td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-warning btn-xs" data-container="body" title="Lihat">
                                            <a href="<?= base_url('master_kavling/master_kavling_detail/' . $value['id'] . ''); ?>" class="btn  border-0">
                                                <i class="fa fa-eye" style="color:white"></i>
                                            </a>
                                        </button>  -->
                                        <?php if($value['pembayaran']==3) {?>
                                            <button type="button" class="btn btn-primary btn-xs" data-container="body" title="Edit">
                                                <a href="<?= base_url('master_konsumen/pembayaran_edit/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
                                                    <i class="fa fa-edit fa-xs" style="color:white"></i>
                                                </a>
                                            </button>
                                        <?php } else {?>
                                            <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Edit">
                                                <a onclick="noedit()" class="btn-sm  border-0">
                                                    <i class="fas fa-lock fa-xs" style="color:white"></i>
                                                </a>
                                            </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Delete">
                                            <a onclick="hapus(<?php echo $value['id'] ?>)" class="btn-sm  border-0">
                                                <i class="far fa-trash-alt fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-xs" data-container="body" title="Pembayaran">
                                            <a href="<?= base_url('master_konsumen/pembayaran/' . $value['konsumen'] . ''); ?>" class="btn-sm  border-0">
                                                <i class="fas fa-print fa-xs" style="color:white"></i>
                                            </a>
                                        </button>

                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>

                            <?php } ?>

                        </table>
                      </div>
                      <!-- /.card-body -->
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );

function hapus(id) {
        swal({
            title: "Yakin data akan dihapus?",
            // text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '<?= base_url('master_konsumen/hapus_pembayaran'); ?>/' + id,
                    type: 'POST',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        swal("Deleted!", "Data berhasil dihapus", "success")
                            .then((value) => {
                                window.location.reload();
                            });
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }

    function noedit() {
        swal({
            title: "Data tidak dapat diubah disini!",
            text: "Ubah di manajemen konsumen.",
            icon: "warning",
            // buttons: true,
            dangerMode: true,
        });
    }

</script>
