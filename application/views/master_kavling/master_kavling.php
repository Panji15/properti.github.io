

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>MANAJEMEN KAVLING</b></h2>
                <br><hr>

                    <div class="card">
                      <div class="card-header">
                        <!-- <h3 class="card-title">DataTable with default features</h3> -->
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'master_kavling/master_kavling_add'; ?>"><i class="fas fa-plus"></i> Tambah Kavling</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="container">
                      <br>
                        <table id="table_id" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Proyek</th>
                                    <th>Kavling</th>
                                    <th>Status Pembangunan</th>
                                    <th>Progress</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($kavling as $value) {?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['nama_proyek'] ?></td>
                                    <td>Blok <?php echo $value['kavling'] ?></td>
                                    <td><?php echo $value['keterangan'] ?></td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar bg-success" style="width: <?php echo $value['progress'] ?>%"></div>
                                        </div>
                                        <span class="badge bg-success"><?php echo $value['progress'] ?>%</span>
                                    </td>                                    
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs" data-container="body" title="Lihat">
                                            <a href="<?= base_url('site_plan/master_kavling_detail/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
                                                <i class="fa fa-eye fa-xs" style="color:white"></i>
                                            </a>
                                        </button> 
                                        <button type="button" class="btn btn-primary btn-xs" data-container="body" title="Edit">
                                            <a href="<?= base_url('master_kavling/master_kavling_edit/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
                                                <i class="fa fa-edit fa-xs" style="color:white"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Delete">
                                            <a onclick="hapus(<?php echo $value['id'] ?>)" class="btn-sm  border-0">
                                                <i class="far fa-trash-alt fa-xs" style="color:white"></i>
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
                    url: '<?= base_url('master_kavling/hapus'); ?>/' + id,
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
