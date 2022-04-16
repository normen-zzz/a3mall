 <!-- Breadcrumb -->
 <!-- <section id="breadcrumb" class="bg-white py-5">
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
 </section> -->
 <!-- Akhir Breadcrumb -->


 <!-- Produk -->
 <section id="produk">
     <div class="container py-5">
         <div class="row d-flex align-items-start">
             <div class="col-lg-2 nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                 <button class="nav-link text-primary text-start active" id="v-1-tab" data-bs-toggle="pill" data-bs-target="#v-1" type="button" role="tab" aria-controls="v-1" aria-selected="true">Spring Bed</button>
                 <button class="nav-link text-primary text-start" id="v-3-tab" data-bs-toggle="pill" data-bs-target="#v-3" type="button" role="tab" aria-controls="v-3" aria-selected="false">Sofa</button>
             </div>
             <div class="col-lg tab-content" id="v-pills-tabContent">
                 <div class="tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                     <div class="row produk-grid">
                         <?php
                            foreach ($springbed as $springbed) {
                                $max = $this->barang->getMaxPriceFromVariation($springbed['kd_product'])->row();
                                $min = $this->barang->getMinPriceFromVariation($springbed['kd_product'])->row();
                            ?>

                             <div class="col-lg-4 py-2">
                                 <a href="<?= base_url('Deskripsi/' . $springbed['slug_product']) ?>" style="text-decoration: none">
                                     <div class="bg-white card-proser">
                                         <img src="<?= base_url('assets/images/produk/' . $springbed['photo_product']) ?>" class="card-img-top p-3" alt="..." />
                                         <div class="card-body">
                                             <p class="fw-light text-secondary small">Spring Bed</p>
                                             <p class="fw-light small text-secondary">Terjual: <span class="fw-bold text-warning"><?= $springbed['sold'] ?></span></p>
                                             <h5 class="card-title fw-bold text-dark"><?= ucfirst($springbed['name_brand']) . ' ' . $springbed['name_product'] ?></h5>
                                             <?php if ($min->min_price != $max->max_price) {
                                                    if ($springbed['discount'] != 0) { ?>
                                                     <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($max->max_price, '0', ',', '.') ?></s></p>
                                                 <?php } ?>
                                                 <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($springbed['discount'] / 100)), '0', ',', '.') ?> ~ <span>Rp. <?= number_format($max->max_price - ($max->max_price * ($springbed['discount'] / 100)), '0', ',', '.') ?></span></p>
                                                 <?php } else {
                                                    if ($springbed['discount'] != 0) { ?>
                                                     <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s></p>
                                                 <?php } ?>
                                                 <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($springbed['discount'] / 100)), '0', ',', '.') ?></p>
                                             <?php } ?><div class="text-center btn-foto">
                                                 <a href="<?= base_url('Deskripsi/' . $springbed['slug_product']) ?>" class="btn rounded-pill px-5 py-2 btn-foto yellow-button">Detail</a>
                                             </div>
                                         </div>
                                     </div>
                                 </a>

                             </div>
                         <?php } ?>
                     </div>
                 </div>
                 <div class="tab-pane fade show active" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">
                     <div class="row produk-grid">

                         <?php
                            foreach ($sofa as $sofa) {
                                $max = $this->barang->getMaxPriceFromVariation($sofa['kd_product'])->row();
                                $min = $this->barang->getMinPriceFromVariation($sofa['kd_product'])->row();
                            ?>
                             <div class="col-lg-4 py-2">
                                 <a href="<?= base_url('Deskripsi/' . $sofa['slug_product']) ?>" style="text-decoration: none">
                                     <div class="bg-white card-proser">
                                         <img src="<?= base_url('assets/images/produk/' . $sofa['photo_product']) ?>" class="card-img-top p-3" alt="..." />
                                         <div class="card-body">
                                             <p class="fw-light text-secondary small">Sofa</p>
                                             <p class="fw-light small text-secondary">Terjual: <span class="fw-bold text-warning"><?= $sofa['sold'] ?></span></p>
                                             <h5 class="card-title fw-bold text-dark"><?= ucfirst($sofa['name_brand'])  . ' ' . $sofa['name_product'] ?></h5>
                                             <?php if ($min->min_price != $max->max_price) {
                                                    if ($sofa['discount'] != 0) { ?>
                                                     <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($max->max_price, '0', ',', '.') ?></s></p>
                                                 <?php } ?>
                                                 <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($sofa['discount'] / 100)), '0', ',', '.') ?> ~ <span>Rp. <?= number_format($max->max_price - ($max->max_price * ($sofa['discount'] / 100)), '0', ',', '.') ?></span></p>
                                                 <?php } else {
                                                    if ($sofa['discount'] != 0) { ?>
                                                     <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s></p>
                                                 <?php } ?>
                                                 <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($sofa['discount'] / 100)), '0', ',', '.') ?></p>
                                             <?php } ?><div class="text-center btn-foto">
                                                 <a href="<?= base_url('Deskripsi/' . $sofa['slug_product']) ?>" class="btn rounded-pill px-5 py-2 btn-foto yellow-button">Detail</a>
                                             </div>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                         <?php } ?>
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