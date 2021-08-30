<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <?php foreach ($message as $value) {?>
                <div class="card card-solid">
                    <div class="card-header">
                    <div class="mailbox-controls with-border text-right">
                                    <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    </div> -->
                                    <!-- /.btn-group -->
                            <h2 class="card-title"><b>INBOX</b></h2>
                            <button type="button" class="btn btn-default btn-sm" title="Print">
                                <a href="<?= base_url('notification/print_notification/' . $value['id'] . ''); ?>">
                                    <i class="fas fa-print"></i>
                                </a>
                            </button>
                        </div><br>

                        <div class="card">
                            <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                    <h5><b><?php echo $value['subject'] ?></b></h5>
                                    <h6>From: <?php echo $value['form'] ?> | To: <?php echo $value['to'] ?>
                                    <span class="mailbox-read-time float-right"><?php echo date('d-F-Y h:i:s',strtotime($value['date_added'])) ?></span></h6>
                                </div>
                                <div class="mailbox-read-message">
                                    <!-- <p>Hello John,</p> -->

                                    <p><?php echo $value['message'] ?>.</p>

                                    <!-- <p>Thanks,<br>Jane</p> -->
                                </div>
                                <!-- /.mailbox-read-message -->
                            </div>
                        <!-- /.card-body -->
                        </div>

                    </div>
                </div>
                <?php } ?>

                <script>
                    window.print();
                </script>
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
