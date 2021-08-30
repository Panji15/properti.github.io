<!-- <style>
	.width-profile{
		max-width: 768px;
		margin: 30px auto;
	}
	.thumbnail-proof
	{
		overflow: hidden;
		text-align: center;
		margin-bottom: 50px;
	}
	.view-img
	{
		margin: 0 auto;
		width: 275px;
		height: 275px;
		/*border-radius: 50%;*/

	}
	.view-img img
	{
		width: 100%;
		height: 100%;
		/*border-radius: 50%;*/
		object-fit: contain;
		display:block;
	}
	#upload
	{
		display: none;
	}
    #uploading
	{
		display: none;
	}
	#files
	{
		display: none;
	}
	.uploadbtn
	{
		cursor: pointer ;
		text-transform: normal;
		background: #33b8c4;
		color: #fff;
		display: inline-block;
		text-decoration: none;
		width: auto;
		font-size: 16px;
		line-height: 18px;
		letter-spacing: 0.2px;
		padding: 12px 16px;
		font-weight: normal;
		border: 1px solid transparent;
		min-width: 51.77708763999664px;
		border-radius: 10px;
		border-color: none;
		-webkit-transition: background 0.3s, border-color 0.3s;
		-moz-transition: background 0.3s, border-color 0.3s;
		transition: background 0.3s, border-color 0.3s;
		transition: all 0.5s;
		margin-top: 20px;
		position: relative;
		overflow: hidden;
		text-align: center;
	}

	.uploadbtn:after {
		content: "\f093";
		font-family: FontAwesome;
		color: #fff;
		font-size: 24px;
		width: 100%;
		height: 100%;
		position: absolute;
		top: -100%;
		text-align: center;
		line-height: 38px;
		left: 0;
		-webkit-transition: all 0.15s;
		-moz-transition: all 0.15s;
		transition: all 0.15s;
	}
	.uploadbtn:focus,
	.uploadbtn:active,
	.uploadbtn:hover
	{
		color: #fff;
	}
	.uploadbtn span {
		display: inline-block;
		width: 100%;
		height: 100%;
		-webkit-transition: all 0.15s;
		-webkit-backface-visibility: hidden;
		-moz-transition: all 0.15s;
		-moz-backface-visibility: hidden;
		transition: all 0.15s;
		backface-visibility: hidden;
		text-transform: normal;
	}
	.uploadbtn:hover:after {
		top: 0;
	}
	.uploadbtn:hover span {
		-webkit-transform: translateY(300%);
		-moz-transform: translateY(300%);
		-ms-transform: translateY(300%);
		transform: translateY(300%);
	}

    
</style> -->
<?php error_reporting(error_reporting() & ~E_NOTICE);
  $array_progress = array(
    ''    => '--Pilih--',
    '0'   => '0 %',
    '10'  => '10 %',
    '20'  => '20 %',
    '30'  => '30 %',
    '40'  => '40 %',
    '50'  => '50 %',
    '60'  => '60 %',
    '70'  => '70 %',
    '80'  => '80 %',
    '90'  => '90 %',
    '100' => '100 %',
  );
?>
<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>TAMBAH PROYEK</b></h2>
                <br><hr>


              <!-- /.card-header -->
              <div class="col-md-12">
                <div id="notif"></div>
              </div>
              <form id="form-edit" method="POST" action="<?= base_url(); ?>master_proyek/proses_save/" enctype="multipart/form-data">
                  <div class="row">

                    <div class="col-md-6 col-sm-6 col-12">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Tambah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                          <div class="card-body">
                            <div class="form-group">
                              <!-- <?php echo form_open_multipart('upload/aksi_upload');?> -->
 
                              <input type="file" name="img_proyek" />

                              <br /><br />

                              <!-- <input type="submit" value="upload" /> -->
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="">
                              <label for="exampleInputEmail1">Nama Proyek</label>
                              <input type="text" name="nama_proyek" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Kavling</label>
                              <input type="text" name="jumlah_kavling" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Sisa Kavling</label>
                              <input type="text" name="sisa_kavling" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Lokasi</label>
                              <input type="text" name="lokasi" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Luas</label>
                              <input type="text" name="luas" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi Proyek</label>
                              <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                          </div>
                          <!-- /.card-body -->
                          

                          <!-- <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_proyek'; ?>"> Kembali</a>
                            <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                          </div> -->
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
                                  <th><button class="btn btn-primary btn-block" id="BarisBaru"><i class="fa fa-plus"></i></button></th>
                                </tr>
                              </thead>
                              <tbody></tbody> 
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
                  var Baris = '<tr>';
                          Baris += '<td class="text-center">'+Nomor+'</td>';
                          Baris += '<td>';
                              // Baris += '<input type="text" name="spesifikasi[]" class="form-control first_name" placeholder="..." required="">';
                              Baris += '<select name="spesifikasi[]" class="form-control first_name" required="">';
                              Baris += '<option value="">--Pilih--</option>';
                              Baris += '<?php foreach ($jenis_spesifikasi as $val){ ?> <option value="<?php echo $val['id'] ?>"><?php echo $val['spesifikasi'] ?></option>  <?php } ?>';
                              Baris += '</select>';
                          Baris += '</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="detail[]" class="form-control last_name" placeholder="..." required="">';
                          Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="far fa-trash-alt"></i></a>';
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