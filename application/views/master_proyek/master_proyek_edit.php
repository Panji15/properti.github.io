<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">
          <?php if (isset($proyek)) {?>
            <?php foreach ($proyek2 as $value) ?>
          <?php } else { ?>
            <?php foreach ($proyek as $value) ?>
          <?php } ?>
                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>EDIT PROYEK</b></h2>
                <br><hr>


              <!-- /.card-header -->
              <div class="col-md-12">
                <div id="notif"></div>
              </div>

              <form id="form_validasi" method="post" role="form">
              <!-- <form id="form-edit" method="POST" action="<?= base_url(); ?>master_proyek/proses_edit/" enctype="multipart/form-data"> -->
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                          <div class="card-body">
                            <div class="form-group">
                              <img src="<?= base_url(''.$value['img_proyek'].''); ?>" alt="Photo 3" class="img-fluid" width="50%">
                              <br><br>
                              <input type="file" name="img_proyek" />
                              <br><br>
                            </div>
                            <div class="form-group">
                              <input type="hidden" name="id" class="form-control" value="<?php echo $value['id'] ?>">
                              <label for="exampleInputEmail1">Nama Proyek</label>
                              <input type="text" name="nama_proyek" class="form-control" value="<?php echo $value['nama_proyek'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Kavling</label>
                              <input type="text" name="jumlah_kavling" class="form-control" value="<?php echo $value['jumlah_kavling'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Sisa Kavling</label>
                              <input type="text" name="sisa_kavling" class="form-control" value="<?php echo $value['sisa_kavling'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Lokasi</label>
                              <input type="text" name="lokasi" class="form-control" value="<?php echo $value['lokasi'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Luas</label>
                              <input type="text" name="luas" class="form-control" value="<?php echo $value['luas'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi Proyek</label>
                              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter ..."><?php echo $value['deskripsi'] ?></textarea>
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <!-- <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_proyek'; ?>"> Kembali</a>
                            <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                          </div> -->
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Spesifikasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                          <div class="card-body">
                            <table class="table table-bordered" id="tableLoop">
                              <thead>
                                <tr>
                                  <th width="5%"class="text-center">#</th>
                                  <th width="30%">Spesifikasi</th>
                                  <th width="50%">Detail</th>
                                  <th><button class="btn btn-primary btn-xs btn-block" id="BarisBaru"><i class="fa fa-plus"></i></button></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $i=1;
                                foreach ($proyek as $val) {?> 
                                  <tr>

                                  <td>
                                    <?php echo $i++ ?>
                                    <!-- <input type="text" name="idts[]" value="<?php echo $val['idts'] ?>"> -->
                                    <!-- <textarea style="display: none;" name="data_json[]"><?=json_encode($value);?></textarea> -->
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $val['spesifikasi'] ?>" name="spesifikasi[]">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $val['detail'] ?>" name="detail[]">
                                  </td>
                                  <td><?php echo $val['nama_spesifikasi'] ?></td>
                                  <td><?php echo $val['detail'] ?></td>
                                  <td class="text-center">
                                    <a class="btn btn-danger btn-xs btn-block" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="far fa-trash-alt"></i></a>
                                  </td>
                                  </tr>
                                <?php } ?>
                              </tbody> 
                            </table>
                            <!-- <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="">
                              <label for="exampleInputEmail1">Pondasi</label>
                              <input type="text" name="pondasi" class="form-control" value="">
                            </div> -->
                            <!-- <div class="form-group">
                              <label for="exampleInputPassword1">Struktur</label>
                              <input type="text" name="struktur" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Besi</label>
                              <input type="text" name="besi" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Kolom</label>
                              <input type="text" name="kolom" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Dinding</label>
                              <input type="text" name="dinding" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kusen</label>
                              <input type="text" name="kusen" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Plafon</label>
                              <input type="text" name="plafon" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Rangka</label>
                              <input type="text" name="rangka" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Listplank</label>
                              <input type="text" name="listplank" class="form-control" value="">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Sanitari</label>
                              <input type="text" name="sanitari" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Sertifikat</label>
                              <input type="text" name="sertifikat" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Listrik</label>
                              <input type="text" name="listrik" class="form-control" value="">
                            </div> -->


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_proyek'; ?>"> Kembali</a>
                            <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                      </div>
                      <!-- /.card -->
                    </div>

                    </div>
                  </form>




              <!-- /.card-body -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

          <script>
              $(document).ready(function() {
                 for(B=1; B<=1; B++){
                  Barisbaru();
                 } 
                 $('#BarisBaru').click(function(e) {
                     e.preventDefault();
                     Barisbaru();
                 });

                 $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
              });

              function Barisbaru() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var Nomor = $("#tableLoop tbody tr").length + 1;
                  var Baris = '<tr style="">';
                          Baris += '<td class="text-center">'+Nomor+'</td>';
                          Baris += '<td>';
                              // Baris += '<input type="text" name="spesifikasi[]" class="form-control first_name" placeholder="...">';
                              Baris += '<select name="spesifikasi[]" class="form-control first_name" required="">';
                              Baris += '<option value="">--Pilih--</option>';
                              Baris += '<?php foreach ($jenis_spesifikasi as $val){ ?> <option value="<?php echo $val['id'] ?>"><?php echo $val['spesifikasi'] ?></option>  <?php } ?>';
                              Baris += '</select>';
                          Baris += '</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="detail[]" class="form-control last_name" placeholder="...">';
                          Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-danger btn-xs btn-block" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="far fa-trash-alt"></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              $(document).ready(function() {
                 $('#SimpanData').submit(function(e) {
                     e.preventDefault();
                     biodata();
                 });
              });

              function biodata() {
                  $.ajax({
                      url:$("#SimpanData").attr('action'),
                      type:'post',
                      cache:false,
                      dataType:"json",
                      data: $("#SimpanData").serialize(),
                      success:function (data) {
                          if (data.success == true) {
                              $('.first_name').val('');
                              $('.last_name').val('');
                              $('#notif').fadeIn(800, function() {
                                 $("#notif").html(data.notif).fadeOut(5000).delay(800); 
                              });
                          }
                          else{
                              $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
              }
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('#form_validasi').on('submit', function(e) {
      e.preventDefault();
      var btn = $('#submit');
      $.ajax({
          url: '<?= base_url('master_proyek/proses_edit/'); ?>', //nama action script php sobat
          data: new FormData(this),
          type: 'POST',
          dataType: 'json',
          processData: false,
          contentType: false,
          beforeSend: function() {
              // btn.button('loading');
              btn.html('Loading...');
          },
          complete: function() {
              btn.html('Submit');
          },
          success: function(data) {
              console.log(data);
              $('.form-group').removeClass('has-error');
              $('.text-danger').remove();
              if (data['error']) {
                  var text = '';
                  for (i in data['error']) {
                      $('input[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                      $('input[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');
                      $('select[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                      $('select[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');
                      $('textarea[name=\'' + i + '\']').closest('.form-group').addClass('has-error');
                      $('textarea[name=\'' + i + '\']').after('<small class="text-danger"><i>' + data['error'][i] + '</i></small>');

                      text += data['error'][i] + '\n';

                  }
                  swal("Oops...", text, "error");
              } else if (data['success']) {
                  swal("Success!", "Data berhasil diupdate", "success")
                      .then((value) => {
                          // window.location.reload();
                          window.location.href = "<?= base_url('master_proyek/'); ?>";
                      });
              } else {
                  swal("Oops...", "Something went wrong :(", "error");
              }
          },
          error: function(data) {
              swal("Oops...", "Something went wrong :(", "error");
          }
      });
  });
});
</script>