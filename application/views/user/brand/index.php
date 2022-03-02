 <!-- Breadcrumb -->
 <section id="breadcrumb" class="bg-white py-5">
     <div class="container">
         <div class="row">
             <div class="col-lg py-3">
                 <!-- <p class="text-secondary fw-light">Home/ Brand / <span class="yellow-text">NAMA BRAND</span></p> -->
             </div>
             <div class="col-lg text-center">
                 <h3 class="fw-bold"><?= $branddetail['name_brand'] ?></h3>
             </div>
             <div class="col"></div>
         </div>
     </div>
 </section>
 <!-- Akhir Breadcrumb -->

 <!-- Desk Brand -->
 <section class="bg-white my-5">
     <div class="container py-5">
         <div class="row">
             <p class="m-0">
                 <span class="fw-bolder text-dark"><?= ucwords($branddetail['name_brand'])  ?></span>
                 <span class="fw-light text-secondary"><?= $branddetail['describe_brand'] ?></span>
             </p>
         </div>
     </div>
 </section>
 <!-- Akhir Desk Brand -->

 <!-- Produk Brand -->
 <section id="brand">
     <div class="container pb-5">
         <div class="row grid-brand">
             <?php foreach ($productbrand as $productbrand) {
                    $max = $this->barang->getMaxPriceFromVariation($productbrand['kd_product'])->row();
                    $min = $this->barang->getMinPriceFromVariation($productbrand['kd_product'])->row(); ?>

                 <div class="col-lg-4 py-2">
                     <a href="<?= base_url('Deskripsi/' . $productbrand['slug_product']) ?>" style="text-decoration: none">
                         <div class="bg-white card-proser">
                             <img src="<?= base_url('assets/images/produk/' . $productbrand['photo_product']) ?>" class="card-img-top p-3" alt="..." />
                             <div class="card-body">
                                 <p class="fw-light text-secondary small"><?= $productbrand['name_category'] ?></p>
                                 <h5 class="card-title fw-bold text-dark"><?= $productbrand['name_product'] ?></h5>
                                 <?php if ($min->min_price != $max->max_price) {
                                        if ($productbrand['beforeprice_product'] != $productbrand['price_product']) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($productbrand['beforeprice_product'] + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($productbrand['beforeprice_product'] + $max->max_price, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($productbrand['price_product'] + $min->min_price, '0', ',', '.') ?> ~ <span>Rp. <?= number_format($productbrand['price_product'] + $max->max_price, '0', ',', '.') ?></span></p>
                                     <?php } else {
                                        if ($productbrand['beforeprice_product'] != $productbrand['price_product']) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($productbrand['beforeprice_product'], '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($productbrand['price_product'], '0', ',', '.') ?></p>
                                 <?php } ?><div class="text-center btn-foto">
                                     <a href="./deskripsi.html" class="btn rounded-pill px-5 py-2 btn-foto yellow-button">Pesan</a>
                                 </div>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php } ?>

         </div>
     </div>
 </section>
 <!-- Akhir Produk Brand -->