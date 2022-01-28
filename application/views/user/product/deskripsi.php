 <!-- Breadcrumb -->
 <section id="breadcrumb" class="bg-white py-5">
     <div class="container">
         <div class="row">
             <divc class="col">
                 <p class="text-secondary fw-light">Home / <?= ucfirst($produk->name_category) ?> / <?= ucfirst($produk->brand_product) ?> / <span class="yellow-text">Deskripsi</span></p>
             </divc>
         </div>
     </div>
 </section>
 <!-- Akhir Breadcrumb -->

 <!-- Deskripsi Foto -->
 <section class="py-5 overflow-hidden" id="deskfoto">
     <div class="container">
         <div class="row">
             <div class="col-lg-7 p-5 padding-foto">
                 <div class="align-items-start">
                     <div class="tab-content pt-2" id="v-pills-tabContent">
                         <?php $no = 0;
                            foreach ($photo_produk as $photo) {
                                $no++; ?>
                             <div class="tab-pane fade show <?php if ($no == 1) {
                                                                echo 'active';
                                                            } ?>" id="tabs-<?= $no ?>" role="tabpanel" aria-labelledby="tabs-<?= $no ?>-tab">
                                 <img src="<?= base_url('assets/images/produk/' . $photo['photo_product']) ?>" class="img-fluid img-desk1" alt="Foto<?= $no ?>" />
                             </div>
                         <?php } ?>
                     </div>
                     <div class="row nav d-flex nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                         <?php $no = 0;
                            foreach ($photo_produk as $photo) {
                                $no++; ?>
                             <button class="col nav-link <?php if ($no == 1) {
                                                                echo 'active';
                                                            } ?>" id="tabs-<?= $no ?>-tab" data-bs-toggle="pill" data-bs-target="#tabs-<?= $no ?>" type="button" role="tab" aria-controls="tabs-<?= $no ?>" aria-selected="true">
                                 <img src="<?= base_url('assets/images/produk/' . $photo['photo_product']) ?>" class="img-fluid img-desk2" alt="Foto1" />
                             </button>
                         <?php } ?>

                     </div>
                 </div>
             </div>
             <div class="col-lg p-5 padding-foto">
                 <div class="card p-5 bg-transparent">
                     <h5 class="fw-bold"><?= $produk->name_product ?></h5>
                     <div class="d-flex">
                         <div class="star yellow-text me-2">
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-half"></i>
                         </div>
                         <p class="fw-light text-secondary">Read reviews (267)</p>
                     </div>
                     <div class="input-group inline-group border-1 border border-dark">
                         <div class="input-group-prepend">
                             <button class="btn text-dark btn-minus">
                                 <i class="bi bi-dash"></i>
                             </button>
                         </div>
                         <input class="form-control quantity border-0 text-center" id="<?php echo $produk->kd_product; ?>" min="0" name="quantity" value="1" type="number" />
                         <div class="input-group-append">
                             <button class="btn text-dark btn-plus">
                                 <i class="bi bi-plus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="text mb-3">
                         <p class="m-0">Total:</p>
                         <h2>Rp 999.999</h2>
                     </div>
                     <div class="d-grid gap-2">
                         <button id="add_cart" class="btn yellow-button shadow" data-kdproduct="<?php echo $produk->kd_product ?>" data-nameproduct="<?php echo $produk->name_product ?>" data-priceproduct="<?php echo $produk->price_product ?>" data-photoproduct="<?php echo $produk->photo_product ?>">Beli Full Set</button>
                         <a href="#" class="btn yellow-button shadow" type="button">Beli Per Item</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Akhir Deskripsi Foto -->

 <!-- Deskripsi -->
 <section id="desk">
     <div class="container">
         <div class="row">
             <div class="col">
                 <ul class="nav nav-pills mb-5 mx-auto justify-content-center rounded-pill" style="background-color: #eeeeee; width: 30%" id="pills-tab" role="tablist">
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark active" id="desk1-tab" data-bs-toggle="pill" data-bs-target="#desk1" type="button" role="tab" aria-controls="desk1" aria-selected="true">Deskripsi</button>
                     </li>
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark" id="desk2-tab" data-bs-toggle="pill" data-bs-target="#desk2" type="button" role="tab" aria-controls="desk2" aria-selected="false">Dimention</button>
                     </li>
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark" id="desk3-tab" data-bs-toggle="pill" data-bs-target="#desk3" type="button" role="tab" aria-controls="desk3" aria-selected="false">Details</button>
                     </li>
                 </ul>
                 <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="desk1" role="tabpanel" aria-labelledby="desk1-tab">
                         <?= $produk->describe_product ?>
                     </div>
                     <div class="tab-pane fade" id="desk2" role="tabpanel" aria-labelledby="desk2-tab">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem iusto, officia ullam vitae odit ex ea molestiae corrupti recusandae. Doloribus error necessitatibus fugit! Voluptas ea enim dolor voluptatem ut recusandae.
                     </div>
                     <div class="tab-pane fade" id="desk3" role="tabpanel" aria-labelledby="desk3-tab">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi labore quia dolor quasi, quas, molestiae voluptatum eligendi esse magnam accusantium nostrum deleniti consequatur illum debitis exercitationem ipsum architecto
                         cum molestias?
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Akhir Deskripsi -->

 <!-- Produk Serupa -->
 <section class="py-5" id="proser">
     <div class="container py-5">
         <div class="row">
             <dov class="col">
                 <h2 class="judul">Produk Serupa</h2>
             </dov>
         </div>
         <div class="row pt-3 proser-grid">
             <?php foreach ($sejenis as $sejenis) { ?>
                 <div class="col py-2">
                     <a href="<?= base_url('Deskripsi/' . $sejenis->kd_product) ?>" style="text-decoration: none">
                         <div class="bg-white card-proser">
                             <img src="<?= base_url('assets/images/produk/' . $sejenis->photo_product) ?>" class="card-img-top p-3" alt="..." />
                             <div class="card-body">
                                 <p class="fw-light text-secondary small"><?= $sejenis->name_category ?></p>
                                 <h5 class="card-title fw-bold text-dark"><?= $sejenis->name_product ?></h5>
                                 <p class="card-text yellow-text mb-3">Rp. <?= $sejenis->price_product ?></p>
                                 <div class="text-center btn-foto">
                                     <a href="<?= base_url('Deskripsi/' . $sejenis->kd_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button">Detail</a>
                                 </div>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php } ?>

         </div>
     </div>
 </section>
 <!-- Akhir Produk Serupa -->

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
                     alert("success");
                 },
                 error: function(error) {
                     alert("Error");
                 }


             });
         });
     });
 </script>