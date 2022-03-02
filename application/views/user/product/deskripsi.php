 <!-- Breadcrumb -->
 <!-- <section id="breadcrumb" class="bg-white py-5">
     <div class="container">
         <div class="row">
             <divc class="col">
                 <p class="text-secondary fw-light">Home / <?= ucfirst($produk->name_category) ?> /
                     <?= ucfirst($produk->brand_product) ?> / <span class="yellow-text">Deskripsi</span></p>
             </divc>
         </div>
     </div>
 </section> -->
 <!-- Akhir Breadcrumb -->

 <!-- Deskripsi Foto -->
 <section class="py-5 overflow-hidden" id="deskfoto">
     <div class="container">
         <div class="row">
             <div class="col-lg-7 p-5 px-5">
                 <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper3">
                     <div class="swiper-wrapper">
                         <?php foreach ($photo_produk as $photo) { ?>
                             <div class="swiper-slide">
                                 <img class="img-desk1" src="<?= base_url('assets/images/produk/' . $photo['photo_product']) ?>" />
                             </div>
                         <?php } ?>
                     </div>
                 </div>
                 <div thumbsSlider="" class="swiper mySwiper2">
                     <div class="swiper-wrapper">
                         <?php foreach ($photo_produk as $photo) { ?>
                             <div class="swiper-slide">
                                 <img src="<?= base_url('assets/images/produk/' . $photo['photo_product']) ?>" />
                             </div>
                         <?php } ?>
                     </div>
                 </div>
             </div>
             <div class="col-lg p-5 padding-foto">
                 <div class="card p-5 bg-transparent">
                     <h5 class="fw-bold"><?= $produk->name_product ?></h5>
                     <div class="row mb-3">
                         <?php foreach ($variation as $variation) { ?>

                             <div class="col-4">
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" data-beforepriceproduk="<?= $produk->beforeprice_product ?>" data-priceproduk="<?= $produk->price_product ?>" data-pricevariation="<?= $variation->price_variation ?>" data-lengthvariation="<?= $variation->length_variation ?>" data-widthvariation="<?= $variation->width_variation ?>" data-weightvariation="<?= $variation->weight_variation ?>" name="variation" value="<?= $variation->id_variation ?>" id="flexRadioDefault1" />
                                     <label class="form-check-label" for="flexRadioDefault1"><?= $variation->name_variation ?></label>
                                 </div>
                             </div>
                             <input class="form-control quantity border-0 text-center" id="pricevariasi" name="pricevariasi" type="number" hidden />
                             <input class="form-control quantity border-0 text-center" id="beforepricevariasi" name="beforepricevariasi" type="number" hidden />
                             <input class="form-control quantity border-0 text-center" id="length_variation" name="length_variation" type="number" hidden />
                             <input class="form-control quantity border-0 text-center" id="width_variation" name="width_variation" type="number" hidden />
                             <input class="form-control quantity border-0 text-center" id="weight_variation" name="weight_variation" type="number" hidden />
                         <?php } ?>
                     </div>
                     <div class="input-group inline-group border-1 border border-dark">
                         <!-- <div class="input-group-prepend">
                             <button class="btn text-dark btn-minus">
                                 <i class="bi bi-dash"></i>
                             </button>
                         </div> -->
                         <input class="form-control quantity border-0 text-center" id="<?php echo $produk->kd_product; ?>" min="0" name="quantity" value="1" type="number" hidden />
                         <!-- <div class="input-group-append">
                             <button class="btn text-dark btn-plus">
                                 <i class="bi bi-plus"></i>
                             </button>
                         </div> -->
                     </div>
                     <div class="text mb-3 pt-3">
                         <p class="m-0">Harga:</p>
                         <?php if ($min->min_price != $max->max_price) {
                                if ($produk->beforeprice_product != $produk->price_product) {  ?>
                                 <h5 class="card-text mb-0 fw-light text-secondary beforetarget" id="beforetarget"><s>Rp. <?= number_format($produk->beforeprice_product + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($produk->beforeprice_product + $max->max_price, '0', ',', '.') ?></s></h5>
                             <?php } ?>
                             <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($produk->price_product + $min->min_price, '0', ',', '.')  ?> ~ <span>Rp. <?= number_format($produk->price_product + $max->max_price, '0', ',', '.')  ?></span></h4>
                             <?php } else {
                                if ($produk->beforeprice_product != $produk->price_product) { ?>
                                 <h5 class="card-text mb-0 fw-light text-secondary beforetarget" id="beforetarget"><s>Rp. <?= number_format($produk->beforeprice_product, '0', ',', '.') ?></s></h5>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($produk->price_product, '0', ',', '.')  ?></h4>
                             <?php } else { ?>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($produk->price_product, '0', ',', '.')  ?> </h4>
                             <?php  } ?>

                         <?php } ?>
                         <!-- <h5 class="mb-0 fw-light text-secondary"><s id="beforetarget">Rp <?= number_format($produk->beforeprice_product, '0', ',', '.') ?></s> ~ Rp <?= number_format($produk->beforeprice_product, '0', ',', '.') ?></h5> -->
                         <!-- <h2 class="yellow-text" id="target">Rp. <?= number_format($produk->price_product, '0', ',', '.')  ?></h2> -->
                         <!-- <h2 class="yellow-text">Coming Soon</h2> -->
                     </div>
                     <div class="col">

                     </div>
                     <div class="d-grid gap-2">
                         <button id="add_cart" class="btn yellow-button shadow" data-kdproduct="<?php echo $produk->kd_product ?>" data-nameproduct="<?php echo $produk->name_product ?>" data-priceproduct="<?php echo $produk->price_product ?>" data-photoproduct="<?php echo $produk->photo_product ?>">Masukan Ke Keranjang</button>
                         <button href="#" class="btn yellow-button shadow" type="button" data-bs-toggle="modal" data-bs-target="#modalPerItem">Beli Per Item</button>
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
                     <!-- <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark" id="desk2-tab" data-bs-toggle="pill" data-bs-target="#desk2" type="button" role="tab" aria-controls="desk2" aria-selected="false">Dimention</button>
                     </li>
                     <li class="nav-item my-2" role="presentation">
                         <button class="nav-link rounded-pill text-dark" id="desk3-tab" data-bs-toggle="pill" data-bs-target="#desk3" type="button" role="tab" aria-controls="desk3" aria-selected="false">Details</button>
                     </li> -->
                 </ul>
                 <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="desk1" role="tabpanel" aria-labelledby="desk1-tab">
                         <?= $produk->describe_product ?>
                     </div>
                     <div class="tab-pane fade" id="desk2" role="tabpanel" aria-labelledby="desk2-tab">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem iusto, officia ullam vitae odit
                         ex ea molestiae corrupti recusandae. Doloribus error necessitatibus fugit! Voluptas ea enim
                         dolor voluptatem ut recusandae.
                     </div>
                     <div class="tab-pane fade" id="desk3" role="tabpanel" aria-labelledby="desk3-tab">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi labore quia dolor quasi, quas,
                         molestiae voluptatum eligendi esse magnam accusantium nostrum deleniti consequatur illum
                         debitis exercitationem ipsum architecto
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
             <?php foreach ($sejenis as $sejenis) {
                    $max = $this->barang->getMaxPriceFromVariation($sejenis->kd_product)->row();
                    $min = $this->barang->getMinPriceFromVariation($sejenis->kd_product)->row(); ?>
                 <div class="col py-2">
                     <a href="<?= base_url('Deskripsi/' . $sejenis->slug_product) ?>" style="text-decoration: none">
                         <div class="bg-white card-proser">
                             <img src="<?= base_url('assets/images/produk/' . $sejenis->photo_product) ?>" class="card-img-top p-3" alt="..." />
                             <div class="card-body">
                                 <p class="fw-light text-secondary small"><?= $sejenis->name_category ?></p>
                                 <h5 class="card-title fw-bold text-dark"><?= $sejenis->name_product ?></h5>
                                 <!-- <p class="card-text yellow-text mb-3">Rp. <?= $sejenis->price_product ?></p> -->
                                 <?php if ($min->min_price != $max->max_price) {
                                        if ($sejenis->beforeprice_product != $sejenis->price_product) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($sejenis->beforeprice_product + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($sejenis->beforeprice_product + $max->max_price, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($sejenis->price_product + $min->min_price, '0', ',', '.') ?> ~ <span>Rp. <?= number_format($sejenis->price_product + $max->max_price, '0', ',', '.') ?></span></p>
                                     <?php } else {
                                        if ($sejenis->beforeprice_product != $sejenis->price_product) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($sejenis->beforeprice_product, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($sejenis->price_product, '0', ',', '.') ?></p>
                                 <?php } ?>
                                 <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                 <div class="text-center btn-foto">
                                     <a href="<?= base_url('Deskripsi/' . $sejenis->slug_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button">Detail</a>
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

 <!-- Modal Per Item -->
 <div class="modal fade" id="modalPerItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Beli Per Item</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <?php foreach ($unit as $unit) { ?>
                         <?php $variationunitwhere = $this->barang->getVariationUnit($unit['kd_unit']);
                            if ($variationunitwhere != '') {
                                $max_unit = $this->barang->getMaxPriceFromVariation($unit['kd_unit'])->row();
                                $min_unit = $this->barang->getMinPriceFromVariation($unit['kd_unit'])->row(); ?>
                             <div class="row py-3 border border-1">
                                 <div class="col-md-2">
                                     <div class="img text-center">
                                         <img src="<?= base_url('assets/images/produk/' . $unit['photo_unit']) ?>" class="img-fluid" alt="" />
                                     </div>
                                 </div>
                                 <div class="col-md my-auto">
                                     <div class="row">
                                         <div class="col-md py-1">
                                             <p><?= $unit['name_unit'] ?></p>
                                         </div>

                                         <div class="col-md py-1 text-center isi-keranjang my-auto">
                                             <p class="my-auto" id="harga<?= $unit['kd_unit'] ?>">Rp. <?= number_format($unit['price_unit'] + $min_unit->min_price, '0', ',', '.') ?> ~ Rp. <?= number_format($unit['price_unit'] + $max_unit->max_price, '0', ',', '.') ?></p>
                                         </div>
                                     </div>

                                     <div class="row border-top pt-3">
                                         <?php foreach ($variationunitwhere as $variationunitwhere) {
                                                if ($variationunitwhere['kd_product'] == $unit['kd_unit']) { ?>
                                                 <div class="col-4">
                                                     <div class="form-check">
                                                         <input class="form-check-input cek <?= $variationunitwhere['kd_product'] ?>" type="checkbox" name="unitvariation[]" id="flexRadioDefault1" onClick="toggle(this,'<?= $variationunitwhere['kd_product'] ?>')" value="<?= $variationunitwhere['id_variation'] ?>" data-priceunitproduk="<?= $unit['price_unit'] ?>" data-unitkdproduk="<?= $unit['kd_unit'] ?>" data-priceunitvariation="<?= $variationunitwhere['price_variation'] ?>" data-lengthunitvariation="<?= $variationunitwhere['length_variation'] ?>" data-widthunitvariation="<?= $variationunitwhere['width_variation'] ?>" data-weightunitvariation="<?= $variationunitwhere['weight_variation'] ?>" />
                                                         <label class="form-check-label" for="flexRadioDefault1"><?= $variationunitwhere['name_variation'] ?></label>
                                                     </div>
                                                 </div>
                                         <?php }
                                            } ?>
                                         <input class="form-control quantity border-0 text-center" id="<?= $unit['kd_unit'] ?>" name="<?= $unit['kd_unit'] ?>" type="number" hidden />
                                         <input type="number" name="length<?= $unit['kd_unit'] ?>" id="length<?= $unit['kd_unit'] ?>" hidden>
                                         <input type="number" name="width<?= $unit['kd_unit'] ?>" id="width<?= $unit['kd_unit'] ?>" hidden>
                                         <input type="number" name="weight<?= $unit['kd_unit'] ?>" id="weight<?= $unit['kd_unit'] ?>" hidden>

                                     </div>
                                 </div>
                                 <div class="col-2">
                                     <button type="button" id="add_unitcart" class="btn btn-warning text-white add_unitcart" data-unitkdproduct="<?php echo $unit['kd_unit'] ?>" data-unitnameproduct="<?php echo $unit['name_unit'] ?>" data-unitpriceproduct="<?php echo $unit['price_unit'] ?>" data-unitphotoproduct="<?php echo $unit['photo_unit'] ?>">Pesan</button>
                                 </div>
                             </div>
                     <?php }
                        } ?>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script>
     function convertToRupiah(angka) {
         var rupiah = '';
         var angkarev = angka.toString().split('').reverse().join('');
         for (var i = 0; i < angkarev.length; i++)
             if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
         return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
     }
     var html = "";
     var value = "New Text "
     $('input:radio[name="variation"]').change(function() {
         var hargaVariasi = $(this).data("pricevariation");
         var hargaProduk = $(this).data("priceproduk");
         var hargaBeforeProduk = $(this).data("beforepriceproduk");
         var newHarga = hargaVariasi + hargaProduk;
         var newBeforeHarga = hargaVariasi + hargaBeforeProduk;
         var panjangVariasi = $(this).data("lengthvariation");
         var lebarVariasi = $(this).data("widthvariation");
         var beratVariasi = $(this).data("weightvariation");


         value = convertToRupiah(newHarga);
         beforeValue = "<s>" + convertToRupiah(newBeforeHarga) + "</s>";
         $('input[name=pricevariasi]').val(hargaVariasi);
         $("#target").html(value);
         $("#beforetarget").html(beforeValue);
         $('input[name=length_variation]').val(panjangVariasi);
         $('input[name=width_variation]').val(lebarVariasi);
         $('input[name=weight_variation]').val(beratVariasi);



     });
 </script>

 <script>
     function convertToRupiah(angka) {
         var rupiah = '';
         var angkarev = angka.toString().split('').reverse().join('');
         for (var i = 0; i < angkarev.length; i++)
             if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
         return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
     }
     var html = "";
     var value = "New Text "
     $('input:checkbox[name="unitvariation[]"]').change(function() {
         var hargaVariasi = $(this).data("priceunitvariation");
         var hargaProduk = $(this).data("priceunitproduk");
         var kdUnit = $(this).data("unitkdproduk");
         var newHarga = hargaVariasi + hargaProduk;

         value = convertToRupiah(newHarga);
         //  $('input[name=pricevariasi]').val(hargaVariasi);
         $("#harga" + kdUnit).html(value);


     });
 </script>
 <script>
     $(document).ready(function() {
         if ($("input[name='variation']:checked").val()) {
             $("input[name='variation']:checked").val(function() {
                 var hargaVariasi = $(this).data("pricevariation");
                 var hargaProduk = $(this).data("priceproduk");
                 var hargaBeforeProduk = $(this).data("beforepriceproduk");
                 var newHarga = hargaVariasi + hargaProduk;
                 var newBeforeHarga = hargaVariasi + hargaBeforeProduk;
                 var panjangVariasi = $(this).data("lengthvariation");
                 var lebarVariasi = $(this).data("widthvariation");
                 var beratVariasi = $(this).data("weightvariation");

                 value = convertToRupiah(newHarga);
                 beforeValue = "<s>" + convertToRupiah(newBeforeHarga) + "</s>"
                 $('input[name=pricevariasi]').val(hargaVariasi);
                 $("#target").html(value);
                 $(".beforetarget").html(beforeValue);
                 $('input[name=length_variation]').val(panjangVariasi);
                 $('input[name=width_variation]').val(lebarVariasi);
                 $('input[name=weight_variation]').val(beratVariasi);
             })

         }
     });
 </script>
 <script type="text/javascript">
     $(document).ready(function() {
         $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
         $('#add_cart').click(function() {

             if ($("input[name='variation']:checked").val()) {
                 var kd_product = $(this).data("kdproduct");
                 var name_product = $(this).data("nameproduct");
                 var pricevariasi = $('#pricevariasi').val()
                 var price_product = $(this).data("priceproduct");
                 var quantity = $('#' + kd_product).val();
                 var photo_product = $(this).data("photoproduct");
                 var variation = $('input[name="variation"]:checked').val();
                 var weight_product = $('input[name=weight_variation]').val();
                 var length_product = $('input[name=length_variation]').val();
                 var width_product = $('input[name=width_variation]').val();


                 $.ajax({
                     url: "<?= base_url(); ?>user/cart/add_to_cart",
                     method: "POST",
                     data: {
                         kd_product: kd_product,
                         name_product: name_product,
                         price_product: parseInt(price_product) + parseInt(pricevariasi),
                         quantity: quantity,
                         photo_product: photo_product,
                         variation: variation,
                         length_product: length_product,
                         width_product: width_product,
                         weight_product: weight_product
                     },
                     success: function(data) {
                         $('#detail_cart').html(data);
                         $('#total_items').load(
                             "<?php echo base_url(); ?>user/cart/load_items");
                         alert("success");
                     },
                     error: function(error) {
                         alert(error);
                     }


                 });
             } else {
                 alert('Tolong Pilih Varian');
                 return false;
             }


         });
     });
 </script>
 <script>
     function toggle(which, theClass) {
         var checkbox = document.getElementsByClassName(theClass);
         for (var i = 0; i < checkbox.length; i++) {
             if (checkbox[i] == which) {

             } else {
                 checkbox[i].checked = false;
             }
         }
     }
 </script>

 <script type="text/javascript">
     $(document).ready(function() {
         $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
         $('.add_unitcart').click(function() {

             if ($("input[name='unitvariation[]']:checked").val()) {
                 var kd_product = $(this).data("unitkdproduct");
                 var name_product = $(this).data("unitnameproduct");
                 var pricevariasi = $(`#${kd_product}`).val()
                 var price_product = $(this).data("unitpriceproduct");
                 var quantity = 1;
                 var photo_product = $(this).data("unitphotoproduct");
                 var variation = $(`.${kd_product}:checked`).val();
                 var length_product = $(`#length${kd_product}`).val();
                 var width_product = $(`#width${kd_product}`).val();
                 var weight_product = $(`#weight${kd_product}`).val();

                 $.ajax({
                     url: "<?= base_url(); ?>user/cart/add_to_cart_unit",
                     method: "POST",
                     data: {
                         kd_product: kd_product,
                         name_product: name_product,
                         price_product: parseInt(price_product) + parseInt(pricevariasi),
                         quantity: quantity,
                         photo_product: photo_product,
                         variation: variation,
                         length_product: length_product,
                         width_product: width_product,
                         weight_product: weight_product
                     },
                     success: function(data) {
                         $('#detail_cart').html(data);
                         $('#total_items').load(
                             "<?php echo base_url(); ?>user/cart/load_items");
                         alert("success");
                     },
                     error: function(error) {
                         alert("Error");
                     }


                 });
             } else {
                 alert('Tolong Pilih Varian');
                 return false;
             }


         });
     });
 </script>

 <script>
     $('input:checkbox[name="unitvariation[]"]').change(function() {
         var kd_unitProduk = $(this).data("unitkdproduk");
         var hargaVariasi = $(this).data("priceunitvariation");
         var hargaProduk = $(this).data("priceunitproduk");
         var newHarga = hargaVariasi + hargaProduk;
         var panjangVariasi = $(this).data("lengthunitvariation");
         var lebarVariasi = $(this).data("widthunitvariation");
         var beratVariasi = $(this).data("weightunitvariation");

         $(`input[name=${kd_unitProduk}]`).val(hargaVariasi);
         $(`input[name=length${kd_unitProduk}]`).val(panjangVariasi);
         $(`input[name=width${kd_unitProduk}]`).val(lebarVariasi);
         $(`input[name=weight${kd_unitProduk}]`).val(beratVariasi);



     });
 </script>