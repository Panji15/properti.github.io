<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">


                <div class="card card-solid">
                  <div class="card-header">
                  <h2 class="card-title"><b>INBOX</b></h2><br><hr>

                    <div class="card">
                      <!-- <div class="card-header">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url() . 'master_proyek/master_proyek_add'; ?>"><i class="fas fa-plus"></i> Tambah Proyek</a>
                      </div> -->
                      <!-- /.card-header -->
                      <div class="container">
                      <br>
                        <table id="table_id" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th width="15%">Form</th>
                                    <th width="15%">Subject</th>
                                    <th colspan="2">Message</th>
                                    <th width="15%"><center>Action</center></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i=1;
                            foreach ($message as $value) {?>
                                <tr>
                                    <!-- <td></td> -->
                                    <td><?php echo $value['form'] ?></td>
                                    <td><?php echo $value['subject'] ?></td>
                                    <td><?php echo substr($value['message'],0,50) ?> ...</td>
                                    <td width="15%"><?php echo date('d-F-Y  h:i:s',strtotime($value['date_added'])) ?></td>
                                    <td><center>
                                        <!-- <a href="<?= base_url('notification/lihat_notification/' . $value['id'] . ''); ?>" class="btn  border-0"><i class="fa fa-eye"></i>
                                            <div class="ripple-container"></div>
                                        </a>                 -->
                                        <!-- <a onclick="hapus(<?php echo $value['id'] ?>)"class="btn  border-0"><i class="fa fa-trash"></i>
                                            <div class="ripple-container"></div>
                                        </a> -->
                                        <button type="button" class="btn btn-warning btn-xs" data-container="body" title="Lihat">
                                            <a href="<?= base_url('notification/lihat_notification/' . $value['id'] . ''); ?>" class="btn-sm  border-0">
                                                <i class="fa fa-eye fa-xs" style="color:white"></i>
                                            </a>
                                        </button> 
                                        <button type="button" class="btn btn-danger btn-xs" data-container="body" title="Delete">
                                            <a onclick="hapus(<?php echo $value['id'] ?>)" class="btn-sm  border-0">
                                                <i class="far fa-trash-alt fa-xs" style="color:white"></i>
                                            </a>
                                        </button>           
                                    </center></td>
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
