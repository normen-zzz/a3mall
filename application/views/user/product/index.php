 <!-- Breadcrumb -->
 <section id="breadcrumb" class="bg-white py-5">
     <div class="container">
         <div class="row">
             <divc class="col-lg py-3">
                 <p class="text-secondary fw-light">Home / <span class="yellow-text">Produk</span></p>
             </divc>
             <div class="col-lg text-center">
                 <h3 class="fw-bold">Produk</h3>
                 <p class="fw-light small text-secondary"></p>
             </div>
             <div class="col"></div>
         </div>
     </div>
 </section>
 <!-- Akhir Breadcrumb -->

 <!-- Produk -->
 <section id="produk">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <ul class="nav nav-pills mb-5 mx-auto justify-content-center rounded-pill" style="background-color: #eeeeee; width: 19%" id="pills-tab" role="tablist">
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark active" id="desk1-tab" data-bs-toggle="pill" data-bs-target="#desk1" type="button" role="tab" aria-controls="desk1" aria-selected="true">Sofa</button>
                     </li>
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark" id="desk2-tab" data-bs-toggle="pill" data-bs-target="#desk2" type="button" role="tab" aria-controls="desk2" aria-selected="false">Spring Bed</button>
                     </li>
                 </ul>
                 <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show container p-0 active" id="desk1" role="tabpanel" aria-labelledby="desk1-tab">
                         <div class="row pt-3 produk-grid">
                             <?php foreach ($sofa as $sofa) { ?>
                                 <div class="col-lg py-2">
                                     <a href="<?= base_url('Deskripsi/' . $sofa['kd_product']) ?>" style="text-decoration: none">
                                         <div class="bg-white card-proser">
                                             <img src="<?= base_url('assets/user/img/produk/' . $photo_produk['photo_product']) ?>" class="card-img-top p-3" alt="..." />
                                             <div class="card-body">
                                                 <p class="fw-light text-secondary small">Sofa</p>
                                                 <h5 class="card-title fw-bold text-dark"><?= $sofa['name_product'] ?></h5>
                                                 <!-- <p class="card-text yellow-text mb-3">Rp. <?= $sofa['price_product'] ?></p> -->
                                                 <p class="card-text yellow-text mb-3">Coming Soon</p>
                                                 <div class="text-center btn-foto">
                                                     <a href="<?= base_url('Deskripsi/' . $sofa['kd_product']) ?>" class="btn rounded-pill px-5 py-2 btn-foto yellow-button">Detail</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                             <?php }
                                ?>
                         </div>
                     </div>
                     <div class="tab-pane fade container p-0" id="desk2" role="tabpanel" aria-labelledby="desk2-tab">
                         <div class="row pt-3 produk-grid">
                             <?php
                                foreach ($springbed as $springbed) {
                                ?>
                                 <div class="col-lg-3 py-2">
                                     <a href="<?= base_url('Deskripsi/' . $springbed['kd_product']) ?>" style="text-decoration: none">
                                         <div class="bg-white card-proser">
                                             <img src="<?= base_url('assets/images/produk/' . $springbed['photo_product']) ?>" class="card-img-top p-3" alt="..." />
                                             <div class="card-body">
                                                 <p class="fw-light text-secondary small">Spring Bed</p>
                                                 <h5 class="card-title fw-bold text-dark"><?= $springbed['name_product'] ?></h5>
                                                 <!-- <p class="card-text yellow-text mb-3">Rp. <?= $springbed['price_product'] ?></p> -->
                                                 <p class="card-text yellow-text mb-3">Coming Soon</p>
                                                 <div class="text-center btn-foto">
                                                     <input type="number" name="quantity" id="<?php echo $springbed['kd_product']; ?>" value="1" class="quantity form-control" hidden>
                                                     <!-- <button id="add_cart" class="btn rounded-pill px-5 py-2 btn-foto yellow-button" data-kdproduct="<?php echo $springbed['kd_product'] ?>" data-nameproduct="<?php echo $springbed['name_product'] ?>" data-priceproduct="<?php echo $springbed['price_product'] ?>" data-photoproduct="<?php echo $springbed['photo_product'] ?>">Pesan</button> -->
                                                     <a href="<?= base_url('Deskripsi/' . $springbed['kd_product']) ?>" class="btn rounded-pill px-5 py-2 btn-foto yellow-button">Detail</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                             <?php }

                                ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Akhir Produk -->

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
         $('#add_cart').click(function() {

             var kd_product = $(this).data("kdproduct");
             var name_product = $(this).data("nameproduct");
             var price_product = $(this).data("priceproduct");
             var quantity = $('#' + kd_product).val();
             var photo_product = $(this).data("photoproduct");
             $.ajax({
                 url: "<?= base_url(); ?>user/cart/add_to_cart",
                 method: "POST",
                 data: {
                     kd_product: kd_product,
                     name_product: name_product,
                     price_product: price_product,
                     quantity: quantity,
                     photo_product: photo_product
                 },
                 success: function(data) {
                     $('#detail_cart').html(data);
                     $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");

                 },
                 error: function(error) {
                     alert("Error");
                 }


             });
         });
     });
 </script>