<?php
$status = array(
    '1' => 'On Proses',
    '2' => 'Pondasi',
    '3' => 'Bangunan Selesai dan Dinding',
);
?>

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>MANAJEMEN KONSUMEN</b></h2>
                <br><hr>

                    <div class="card">
                      <div class="card-header">
                        <!-- <h3 class="card-title">DataTable with default features</h3> -->
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'master_konsumen/master_konsumen_add'; ?>"><i class="fas fa-plus"></i> Pesan Kavling</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="container">
                      <br>
                        <table id="table_id" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Konsumen</th>
                                    <th>Kavling</th>
                                    <th>Proyek</th>
                                    <th>Progress</th>
                                    <th>Status Pembayaran</th>
                                    <th width="18%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($konsumen as $value) {?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td>Blok <?php echo $value['nkav'] ?></td>
                                    <td><?php echo $value['nama_proyek'] ?></td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-success" style="width: <?php echo $value['progress'] ?>%"></div>
                                        </div>
                                        <span class="badge bg-success"><?php echo $value['progress'] ?>%</span>
                                    </td>
                                    <td>
                                        <?php

                                                $day=date('Y-m-d', strtotime($value['da']));

                                                $diff  = date_diff( date_create($day), date_create() );

                                                $berjalan=$diff->format('%m');
                                                $angsuran=$value['jml_angs'];

                                                if ($berjalan<$angsuran){
                                                    $hasil="<b style='color:black'>Sudah Bayar Cicilan</b>";
                                                } elseif ($berjalan==$angsuran){
                                                    $hasil="<b style='color:black'>Sudah Bayar Cicilan</b>";
                                                } else {
                                                    $hasil="<b style='color:red'>Belum Bayar Cicilan</b>";
                                                }

                                                echo $hasil;
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-container="body" title="Edit" style="font-size:none;">
                                            <a href="<?= base_url('master_konsumen/master_konsumen_edit/' . $value['id'] . ''); ?>" class="btn-sm border-0" >
                                                <i class="fa fa-edit fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Delete">
                                            <a onclick="hapus(<?php echo $value['id'] ?>)" class="btn-sm  border-0">
                                                <i class="far fa-trash-alt fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
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
                    url: '<?= base_url('master_konsumen/hapus'); ?>/' + id,
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
</script>
