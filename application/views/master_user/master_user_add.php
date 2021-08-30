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

<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

                <div class="card card-solid">
                <div class="card-header">
                <h2 class="card-title"><b>TAMBAH USER</b></h2>
                <br><hr>

              <!-- /.card-header -->

                    <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Form Tambah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-edit" method="POST" action="<?= base_url(); ?>master_user/proses_save/" enctype="multipart/form-data">
                          <div class="card-body">
                            <!-- <div class="form-group">
 
                              <input type="file" name="img_user" />

                              <br /><br />

                            </div> -->
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama User</label>
                              <?= form_dropdown('nama', $uk, '', 'class="form-control select2" id="nama" required'); ?>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Username</label>
                              <input type="text" name="username" class="form-control" value="">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Level Akses</label>
                              <?php error_reporting(error_reporting() & ~E_NOTICE);
                                    $array_level = array(
                                        ''    => '--Pilih Level Akses--',
                                        '1'   => 'SuperAdmin / Admin',
                                        '2'   => 'Mitra',
                                        '3'   => 'Marketing',
                              );
                              ?>
                              <?= form_dropdown('level', $array_level, $level, 'class="form-control" required'); ?>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="text" name="password" class="form-control" value="">
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url() . 'master_user'; ?>"> Kembali</a>
                            <button type="submit" id="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>



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
