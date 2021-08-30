<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>MANAJEMEN PROYEK</b></h2>
                <br><hr>

                    <div class="card">
                      <div class="card-header">
                        <!-- <h3 class="card-title">DataTable with default features</h3> -->
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'master_proyek/master_proyek_add'; ?>"><i class="fas fa-plus"></i> Tambah Proyek</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="container">
                      <br>
                        <table id="table_id" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Proyek</th>
                                    <th>Jumlah Kavling</th>
                                    <th>Sisa Kavling</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i=1;
                            foreach ($proyek as $value) {?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['nama_proyek'] ?></td>
                                    <td><?php echo $value['jumlah_kavling'] ?></td>
                                    <td><?php echo $value['sisa_kavling'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-container="body" title="Delete">
                                            <a href="<?= base_url('master_proyek/master_proyek_edit/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
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
                    url: '<?= base_url('master_proyek/hapus'); ?>/' + id,
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
