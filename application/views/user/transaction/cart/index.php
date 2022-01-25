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
                 <h2 class="judul">Produk Serupa</h2>
             </dov>
         </div>
         <div class="row pt-3 proser-grid">
             <div class="col py-2">
                 <a href="./deskripsi.html" style="text-decoration: none">
                     <div class="bg-white card-proser">
                         <img src="<?= base_url('assets/user/') ?>img/produk/MH-103.png" class="card-img-top p-3" alt="..." />
                         <div class="card-body">
                             <p class="fw-light text-secondary small">Sofa</p>
                             <h5 class="card-title fw-bold text-dark">Sakarias Armchair</h5>
                             <p class="card-text yellow-text mb-3">Rp. 999.9999s</p>
                             <div class="text-center btn-foto">
                                 <a href="./deskripsi.html" class="btn rounded-pill px-5 py-2 yellow-button">Pesan</a>
                             </div>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="col py-2">
                 <a href="./deskripsi.html" style="text-decoration: none">
                     <div class="bg-white card-proser">
                         <img src="<?= base_url('assets/user/') ?>img/produk/MH-103.png" class="card-img-top p-3" alt="..." />
                         <div class="card-body">
                             <p class="fw-light text-secondary small">Sofa</p>
                             <h5 class="card-title fw-bold text-dark">Sakarias Armchair</h5>
                             <p class="card-text yellow-text mb-3">Rp. 999.9999s</p>
                             <div class="text-center btn-foto">
                                 <a href="./deskripsi.html" class="btn rounded-pill px-5 py-2 yellow-button">Pesan</a>
                             </div>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="col py-2">
                 <a href="./deskripsi.html" style="text-decoration: none">
                     <div class="bg-white card-proser">
                         <img src="<?= base_url('assets/user/') ?>img/produk/MH-103.png" class="card-img-top p-3" alt="..." />
                         <div class="card-body">
                             <p class="fw-light text-secondary small">Sofa</p>
                             <h5 class="card-title fw-bold text-dark">Sakarias Armchair</h5>
                             <p class="card-text yellow-text mb-3">Rp. 999.9999s</p>
                             <div class="text-center btn-foto">
                                 <a href="./deskripsi.html" class="btn rounded-pill px-5 py-2 yellow-button">Pesan</a>
                             </div>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="col py-2">
                 <a href="./deskripsi.html" style="text-decoration: none">
                     <div class="bg-white card-proser">
                         <img src="<?= base_url('assets/user/') ?>img/produk/MH-103.png" class="card-img-top p-3" alt="..." />
                         <div class="card-body">
                             <p class="fw-light text-secondary small">Sofa</p>
                             <h5 class="card-title fw-bold text-dark">Sakarias Armchair</h5>
                             <p class="card-text yellow-text mb-3">Rp. 999.9999s</p>
                             <div class="text-center btn-foto">
                                 <a href="./deskripsi.html" class="btn rounded-pill px-5 py-2 yellow-button">Pesan</a>
                             </div>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
     </div>
 </section>
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
             }
         });
     });

     //untuk hapus cart
     $(document).on('click', '.hapus_cart', function() {
         var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
         $.ajax({
             url: "<?php echo base_url(); ?>user/cart/hapus_cart",
             method: "POST",
             data: {
                 row_id: row_id
             },
             success: function(data) {
                 $('#detail_cart').html(data);
                 $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
             }
         });
     });
 </script>