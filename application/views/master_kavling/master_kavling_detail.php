<style>
.product-images {
    max-width: 90%;
    height: auto;
    width: 90%;
}

.form-groups {
    /* margin-bottom: 1rem; */
}
</style>

<?php
$bayar = array(
    '1'   => 'Cash',
    '2'   => 'KPR',
);
?>


<section class="content">
      <div class="">
        <div class="row">
          <div class="col-12">

              <?php foreach ($kavling as $value) ?>
              <!-- <?php print_r($value) ?> -->
              <div class="card card-solid">
              <div class="card-header">
                <h2 class="card-title"><b>KAVLING DETAIL</b></h2>
                <br><hr>
                  <form class="form-horizontal" action="<?= base_url(); ?>kavling_detail/edit_kavling/"></form>
                    <div class="row">
                      
                      <div class="col-12 col-sm-6">
                        <div class="col-12">
                        

                          <!-- <img src="assets/images/gran_urbano.png" alt="Photo 3" class="img-fluid"> -->
                          <img src="<?= base_url('./storage/kavling/A1.png'); ?>"  width="20px" class="product-images" alt="Product Image">

                          <h5 class="my-3"><b>Progress :</b> <span class="badge bg-success"><?php echo $value['progress'] ?>%</span></h5>

                          <table id="" class="table table-striped" border="0">
                            <thead>
                                <tr>
                                    <!-- <th colspan="3"><h3 class="my-3">Blok <?php echo $value['kvl'] ?>, Perumahan <?php echo $value['nama_proyek'] ?></h3></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Note :</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><?php echo $value['note'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <!-- <div class="col-12 product-image-thumbs">
                          <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                          <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                          <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                          <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                          <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                        </div> -->
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="card">
                        <input class="form-control" type="hidden" name="id_konsumen" placeholder="Password" value="<?php echo $value['id'] ?>">
                        <input class="form-control" type="hidden" name="" placeholder="Password" value="<?php echo $value['idkav'] ?>">


                          <table id="" class="table table-striped" border="0">
                              <thead>
                                  <tr>
                                  <?php 
                                        if ($value['kvl']==null || $value['kvl']==null){
                                          $kvl="";
                                          $nama_proyek="";
                                        }else{
                                          $kvl=$value['kvl'];
                                          $nama_proyek=$value['nama_proyek'];
                                        } 
                                      ?>
                                      <th colspan="3"><h3 class="my-3">Blok <?php echo $kvl ?>, Perumahan <?php echo $nama_proyek ?></h3></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td width="">Nama Konsumen</td>
                                      <td> : </td>
                                      <?php 
                                        if ($value['nama']==null){
                                          $nama="";
                                        }else{
                                          $nama=$value['nama'];
                                        } 
                                      ?>
                                      <td><?php echo $nama ?></td>
                                  </tr>
                                  <tr>
                                      <td>NIK</td>
                                      <td> : </td>
                                      <?php 
                                        if ($value['identitas']==null){
                                          $identitas="";
                                        }else{
                                          $identitas=$value['identitas'];
                                        } 
                                      ?>
                                      <td><?php echo $identitas ?></td>
                                  </tr>
                                  <tr>
                                      <td>No Hp</td>
                                      <td> : </td>
                                      <?php 
                                        if ($value['kontak']==null){
                                          $kontak="";
                                        }else{
                                          $kontak=$value['kontak'];
                                        } 
                                      ?>
                                      <td><?php echo $kontak ?></td>
                                  </tr>
                                  <tr>
                                      <td>Harga Jual</td>
                                      <td> : </td>
                                      <?php 
                                        if ($value['harga_jual']==null){
                                          $harga_jual=0;
                                        }else{
                                          $harga_jual=$value['harga_jual'];
                                        } 
                                      ?>
                                      <td>Rp <?php echo rupiah($harga_jual) ?></td>
                                  </tr>
                                  <tr>
                                      <td>Diskon</td>
                                      <td> : </td>
                                      <?php 
                                        if ($value['diskon']==null){
                                          $diskon=0;
                                        }else{
                                          $diskon=$value['diskon'];
                                        } 
                                      ?>
                                      <td><?php echo $diskon ?> %</td>
                                  </tr>
                                  <tr>
                                      <td>Harga Pengikat</td>
                                      <td> : </td>
                                      <?php
                                          error_reporting(E_ALL & ~E_NOTICE);
                                          if ($value['harga_pengikat'] == null) {
                                              $hp = 0;
                                          } else {
                                              $hp = $value['harga_pengikat'];
                                          } 
                                      ?>
                                      <td>Rp <?php echo rupiah($hp) ?></td>
                                  </tr>
                                  <tr>
                                      <td>Booking Fee</td>
                                      <td> : </td>
                                      <td>Rp <?php echo rupiah($value['booking_fee']) ?></td>
                                  </tr>
                                  <tr>
                                      <td>Tanda Jadi</td>
                                      <td> : </td>
                                      <td>Rp <?php echo rupiah($value['tanda_jadi']) ?></td>
                                  </tr>
                                  <tr>
                                      <td>Uang Muka (DP)</td>
                                      <td> : </td>
                                      <td>Rp <?php echo rupiah($value['uang_muka']) ?></td>
                                  </tr>
                                  <tr>
                                      <td>Kurang Pembayaran</td>
                                      <td> : </td>
                                      <?php
                                          error_reporting(E_ALL & ~E_NOTICE);
                                          if ($jml_pembayaran == null) {
                                              $tp = 0;
                                          } else {
                                              $tp = $total_angsuran;
                                          } 
                                      ?>
                                      <td>Rp 
                                        <?php
                                        $dis = $value['harga_jual']-($value['harga_jual']/100*$value['diskon']);
                                        echo rupiah($dis-$tp);
                                        ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Cara Bayar</td>
                                      <td> : </td>
                                      <td><?php echo $value['bayar'] ?></td>
                                  </tr>
                                  <tr>
                                      <td>Cicilan</td>
                                      <td> : </td>
                                      <td>Rp <?php echo rupiah($value['cicilan']) ?></td>
                                  </tr>

                                  <!-- <tr>
                                      <td>Jumlah Pembayaran</td>
                                      <td> : </td>
                                      <td>Rp <?php echo rupiah($value['harga_jual']-($value['harga_jual']/100*$value['diskon'])) ?></td>
                                  </tr> -->
                              </tbody>
                          </table>

                          <br>

                          <table id="" class="table table-striped" border="0">
                              <thead>
                                  <tr>
                                      <!-- <th colspan="3"><p class="my">Sales/Marketing</p></th> -->
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Nama Marketing</td>
                                      <td> : </td>
                                      <td><?php echo $value['namarkt'] ?></td>
                                  </tr>
                                  <tr>
                                      <td>No Hp</td>
                                      <td> : </td>
                                      <td><?php echo $value['hp'] ?></td>
                                  </tr>
                              </tbody>
                          </table>

                        </div>



                        <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                        <hr>
                        <h4>Available Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-default text-center active">
                            <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                            Green
                            <br>
                            <i class="fas fa-circle fa-2x text-green"></i>
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                            Blue
                            <br>
                            <i class="fas fa-circle fa-2x text-blue"></i>
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                            Purple
                            <br>
                            <i class="fas fa-circle fa-2x text-purple"></i>
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                            Red
                            <br>
                            <i class="fas fa-circle fa-2x text-red"></i>
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                            Orange
                            <br>
                            <i class="fas fa-circle fa-2x text-orange"></i>
                          </label>
                        </div>

                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                            <span class="text-xl">S</span>
                            <br>
                            Small
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                            <span class="text-xl">M</span>
                            <br>
                            Medium
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                            <span class="text-xl">L</span>
                            <br>
                            Large
                          </label>
                          <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                            <span class="text-xl">XL</span>
                            <br>
                            Xtra-Large
                          </label>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                          <h2 class="mb-0">
                            $80.00
                          </h2>
                          <h4 class="mt-0">
                            <small>Ex Tax: $80.00 </small>
                          </h4>
                        </div>

                        <div class="mt-4">
                          <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                          </div>

                          <div class="btn btn-default btn-lg btn-flat">
                            <i class="fas fa-heart fa-lg mr-2"></i>
                            Add to Wishlist
                          </div>
                        </div>

                        <div class="mt-4 product-share">
                          <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                          </a>
                        </div> -->
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- <div class="row mt-4">
                    <nav class="w-100">
                      <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                      </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                      <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                      <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->



              <!-- /.card-body -->
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
</section>
<!-- 
<script>
  $(document).ready(function(e) {
     $(".numberjs").each(function(index, el) {
         $(this).number(true);
     });
	$('.select2').select2();
    $('.datatable').DataTable({
		"aaSorting" : [],
    "lengthMenu": [[10, 25, 50, 100, 250, 500], [10, 25, 50, 100, 250, 500]],
    stateSave: true
	});
	$('.datepicker').datepicker({autoclose: true,format: 'dd-mm-yyyy'});
});
</script> -->