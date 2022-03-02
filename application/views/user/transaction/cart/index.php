 <!-- Breadcrumb -->
 <section id="breadcrumb" class="bg-white py-5">
     <div class="container">
         <div class="row">
             <divc class="col">
                 <p class="text-secondary fw-light">Home / <span class="yellow-text">Keranjang</span></p>
             </divc>
         </div>
     </div>
 </section>
 <!-- Akhir Breadcrumb -->

 <?php if ($alamat == '') {
        if ($this->session->userdata('user_data') || $this->session->userdata('email')) {
    ?>
         <!-- Belum ada alamat -->
         <section class="my-5">
             <div class="container">
                 <div class="row">
                     <div class="col">
                         <h5>Alamat</h5>
                     </div>
                 </div>
                 <div class="row bg-white p-5">
                     <div class="col text-center">
                         <a href="./alamat.html" class="btn yellow-button px-5 py-3" data-bs-toggle="modal" data-bs-target="#exampleModal1">Buat Alamat</a>
                     </div>
                 </div>
             </div>
         </section>
         <!-- Akhir Belum ada alamat -->
     <?php }
    } else { ?>

     <!-- Alamat -->
     <!-- Profile -->
     <section class="py-5 bg-light" id="profile">
         <div class="container py-5">
             <div class="row pb-3">
                 <div class="col">
                     <h2>Alamat Saya</h2>
                 </div>
             </div>
             <div class="row bg-white p-5 shadow">
                 <div class="col">
                     <p><?= $alamat['nama_alamat'] ?></p>
                     <p><?= $alamat['telp_alamat'] ?></p>
                     <p><?= $alamat['detail_alamat'] ?> - <?= $alamatongkir->subdistrict_name ?>, <?= $alamatongkir->city ?>, <?= $alamatongkir->province ?> ID <?= $alamat['pos_alamat'] ?>
                 </div>
                 <div class="col-2 text-end mb-auto">
                     <a href="<?= base_url('user/Profile/deleteAlamat/' . $alamat['id_alamat']) ?>" class="btn" onclick="return confirm('Apakah Yakin ingin Menghapus Alamat?')" style="text-decoration: underline">hapus</a>
                 </div>
             </div>
         </div>
     </section>
     <!-- ./Profile -->
     <!-- Akhir Alamat -->
 <?php } ?>

 <!-- Keranjang -->
 <section id="keranjang" class="bg-white py-5 my-5">
     <div class="container" id="detail_cart">
     </div>
 </section>
 <!-- Akhir Keranjang -->

 <!-- Check -->
 <section class="bg-white py-5 " id="total_cart">
 </section>
 <!-- Akhir Check -->

 <!-- Produk Serupa -->
 <section class="py-5" id="proser">
     <div class="container py-5">
         <div class="row">
             <dov class="col">
                 <h2 class="judul">Produk Unggulan</h2>
             </dov>
         </div>
         <div class="row pt-3 proser-grid">
             <?php foreach ($unggulan as $unggulan) {
                    $max = $this->barang->getMaxPriceFromVariation($unggulan->kd_product)->row();
                    $min = $this->barang->getMinPriceFromVariation($unggulan->kd_product)->row(); ?>
                 <div class="col-3 py-2">
                     <a href="<?= base_url('Deskripsi/' . $unggulan->slug_product) ?>" style="text-decoration: none">
                         <div class="bg-white card-proser">
                             <img src="<?= base_url('assets/images/produk/' . $unggulan->photo_product) ?>" class="card-img-top p-3" alt="..." />
                             <div class="card-body">
                                 <p class="fw-light text-secondary small"><?= $unggulan->name_category ?></p>
                                 <h5 class="card-title fw-bold text-dark"><?= ucfirst($unggulan->name_brand) . ' ' . $unggulan->name_product ?></h5>
                                 <!-- <p class="card-text yellow-text mb-3">Rp. <?= $unggulan->price_product ?></p> -->
                                 <?php if ($min->min_price != $max->max_price) {
                                        if ($unggulan->beforeprice_product != $unggulan->price_product) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($unggulan->beforeprice_product + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($unggulan->beforeprice_product + $max->max_price, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($unggulan->price_product + $min->min_price, '0', ',', '.') ?> ~ <span>Rp. <?= number_format($unggulan->price_product + $max->max_price, '0', ',', '.') ?></span></p>
                                     <?php } else {
                                        if ($unggulan->beforeprice_product != $unggulan->price_product) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($unggulan->beforeprice_product, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($unggulan->price_product, '0', ',', '.') ?></p>
                                 <?php } ?>
                                 <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                 <div class="text-center btn-foto">
                                     <a href="<?= base_url('Deskripsi/' . $unggulan->slug_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button">Detail</a>
                                 </div>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php } ?>
         </div>
     </div>
 </section>

 <!-- Modal -->
 <!-- Modal tambah -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form class="row g-3 needs-validation" method="POST" action="<?= base_url('user/Profile/addAlamat') ?>" novalidate>
                     <div class="col-md-6">
                         <label for="validationCustom01" class="form-label">Nama</label>
                         <input type="text" name="name" class="form-control" id="validationCustom01" required />
                     </div>
                     <div class="col-md-6">
                         <label for="validationCustomUsername" class="form-label">No Telepon</label>
                         <input type="number" name="phone" class="form-control" required />
                     </div>
                     <div class="col-md-6">
                         <label for="validationCustom03" class="form-label">Provinsi</label>
                         <select class="form-select" name="provinsi" id="provinsi" required>
                             <option selected disabled value="">Choose...</option>
                             <?php
                                foreach ($province as $province) {
                                    echo '<option value="' . $province->province_id . '">' . $province->province . '</option>';
                                }
                                ?>
                         </select>
                     </div>
                     <div class="col-md-3">
                         <label for="validationCustom04" class="form-label">Kabupaten</label>
                         <select class="form-select" name="kabupaten" id="kabupaten" required>
                             <option selected disabled value="">Choose...</option>
                             <?php

                                ?>
                         </select>
                         <div class="invalid-feedback">Please select a valid state.</div>
                     </div>
                     <div class="col-md-3">
                         <label for="validationCustom04" class="form-label">Kecamatan</label>
                         <select class="form-select" name="kecamatan" id="kecamatan" required>
                             <option selected disabled value="">Choose...</option>
                             <?php
                                ?>
                         </select>
                         <div class="invalid-feedback">Please select a valid state.</div>
                     </div>

                     <div class="col-md-3">
                         <label for="validationCustom05" class="form-label">Kode Pos</label>
                         <input type="text" name="pos" class="form-control" id="validationCustom05" required />
                         <div class="invalid-feedback">Please provide a valid zip.</div>
                     </div>
                     <div class="col-md-12">
                         <div class="mb-3">
                             <label for="exampleFormControlTextarea1" class="form-label"> Detail Alamat </label>
                             <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
                         </div>
                     </div>
                     <div class="col-12">
                         <button class="btn btn-primary" type="submit">Submit form</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Akhir Modal edit -->

 <!-- Modal Hapus -->
 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Hapus?</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-danger">Hapus</button>
             </div>
         </div>
     </div>
 </div>
 <!-- Akhir Modal Hapus -->
 <!-- End OF Modal -->

 <!-- Akhir Produk Serupa -->
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script>
     //Tampil Cart
     $(document).ready(function() {
         $('#detail_cart').load("<?php echo base_url(); ?>user/cart/load_cart");
     });
     //End Tampil Cart

     //tampil total
     $(document).ready(function() {
         $('#total_cart').load("<?php echo base_url(); ?>user/cart/load_total");

     });
     //end tampil total




     $(document).on('click', '.tambah_qty', function() {
         var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
         var qty = $(this).data("qty");
         $.ajax({
             url: "<?php echo base_url(); ?>user/cart/tambah_qty",
             method: "POST",
             data: {
                 row_id: row_id,
                 qty: qty
             },
             success: function(data) {
                 $('#detail_cart').html(data);
                 $('#total_cart').load("<?php echo base_url(); ?>user/cart/load_total");
                 $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
             }
         });
     });

     $(document).on('click', '.kurang_qty', function() {
         var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
         var qty = $(this).data("qty");
         $.ajax({
             url: "<?php echo base_url(); ?>user/cart/kurang_qty",
             method: "POST",
             data: {
                 row_id: row_id,
                 qty: qty
             },
             success: function(data) {
                 $('#detail_cart').html(data);
                 $('#total_cart').load("<?php echo base_url(); ?>user/cart/load_total");
                 $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
             }
         });
     });

     //untuk hapus cart
     $(document).on('click', '.hapus_cart', function() {
         var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
         confirm('Anda Yakin Ingin Menghapus?')
         $.ajax({
             url: "<?php echo base_url(); ?>user/cart/hapus_cart",
             method: "POST",
             data: {
                 row_id: row_id
             },
             success: function(data) {
                 $('#detail_cart').html(data);
                 $('#total_cart').load("<?php echo base_url(); ?>user/cart/load_total");
                 $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
             }
         });
     });
 </script>

 <script>
     $('#provinsi').change(function() {
         var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi

         if (provinsi_id != '') {
             $.ajax({
                 url: '<?= base_url(); ?>user/Checkout/getCityOngkir',
                 method: 'POST',
                 data: {
                     provinsi_id: provinsi_id
                 },
                 success: function(data) {
                     $('#kabupaten').html(data)
                 }
             });
         }
     });

     $('#kabupaten').change(function() {
         var kabupaten_id = $('#kabupaten').val(); //ambil value id dari provinsi

         if (kabupaten_id != '') {
             $.ajax({
                 url: '<?= base_url(); ?>user/Checkout/getSubDistrictOngkir',
                 method: 'POST',
                 data: {
                     kabupaten_id: kabupaten_id
                 },
                 success: function(data) {
                     $('#kecamatan').html(data)
                 }
             });
         }
     });
 </script>