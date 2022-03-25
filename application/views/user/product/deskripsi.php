 <!-- Deskripsi Foto -->
 <section class="py-5 overflow-hidden" id="deskfoto">
     <div class="container">
         <div class="row">
             <div class="col-lg-7 px-5">
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
             <div class="col-lg px-5 padding-foto">
                 <div class="card p-4 bg-transparent">
                     <h5 class="fw-bold"><?= ucfirst($produk->name_brand) . ' ' . $produk->name_product ?></h5>
                     <div class="row mb-3">
                     <p class="fw-light small text-secondary">Terjual: <span class="fw-bold text-warning">10000</span></p>
                         <p>Pilih Varian :</p>
                         <?php foreach ($variation as $variation) { ?>
                             <div class="col-6">
                                 <div class="form-check form-check-inline border p-2 bg-white">
                                     <input class="form-check-input" type="radio" data-discount="<?= $produk->discount ?>" data-pricevariation="<?= $variation->price_variation ?>" data-lengthvariation="<?= $variation->length_variation ?>" data-widthvariation="<?= $variation->width_variation ?>" data-weightvariation="<?= $variation->weight_variation ?>" name="variation" value="<?= $variation->id_variation ?>" id="flexRadioDefault1" style="cursor: pointer" />
                                     <label class="form-check-label" for="flexRadioDefault1" style="cursor: pointer"><?= $variation->name_variation ?></label>
                                 </div>
                             </div>
                             <input class="form-control quantity border-0 text-center" id="priceproduct" name="priceproduct" type="number" />
                             <input class="form-control quantity border-0 text-center" id="beforepriceproduct" name="beforepriceproduct" type="number" />
                             <input class="form-control quantity border-0 text-center" id="discount" name="discount" type="number" />
                             <input class="form-control quantity border-0 text-center" id="length_variation" name="length_variation" type="number" />
                             <input class="form-control quantity border-0 text-center" id="width_variation" name="width_variation" type="number" />
                             <input class="form-control quantity border-0 text-center" id="weight_variation" name="weight_variation" type="number" />
                         <?php } ?>
                     </div>
                     <?php if ($unit != FALSE) { ?>
                         <div class="row py-3 border-bottom" id="pilihHeadboard">
                             <div class="col me-3 bg-white rounded-3 border border-1">
                                 <img id="photoUnit" src="./assets/img/produk/headbrown1-1.png" alt="#" class="img-fluid" />
                             </div>
                             <div class="col my-auto border-start">
                                 <button type="button" class="btn yellow-button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Ubah Headboard</button>
                             </div>
                         </div>
                     <?php } ?>
                     <input type="text" name="kd_unit" id="kd_unit" hidden>
                     <input type="text" name="photo_unit" id="photo_unit" hidden>
                     <input type="text" name="name_unit" id="name_unit" hidden>

                     <div class="text mb-3 pt-3">
                         <p class="m-0">Harga:</p>
                         <?php if ($min->min_price != $max->max_price) {
                                if ($produk->discount != 0) {  ?>
                                 <h5 class="card-text mb-0 fw-light text-secondary beforetarget" id="beforetarget"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($max->max_price, '0', ',', '.') ?></s></h5>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($min->min_price - ($min->min_price * ($produk->discount / 100)), '0', ',', '.')  ?> ~ <span>Rp. <?= number_format($max->max_price - ($max->max_price * ($produk->discount / 100)), '0', ',', '.')  ?></span></h4>
                             <?php } else { ?>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($min->min_price, '0', ',', '.')  ?> ~ <span>Rp. <?= number_format($max->max_price, '0', ',', '.')  ?></span></h4>
                             <?php }
                            } else {
                                if ($produk->discount != 0) { ?>
                                 <h5 class="card-text mb-0 fw-light text-secondary beforetarget" id="beforetarget"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s></h5>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($min->min_price - ($min->min_price * ($produk->discount / 100)), '0', ',', '.')  ?></h4>

                             <?php } else { ?>
                                 <h4 class="card-text yellow-text mb-2" id="target">Rp. <?= number_format($min->min_price, '0', ',', '.')  ?></h4>

                             <?php  } ?>
                         <?php } ?>
                     </div>

                     <div class="d-grid gap-2">
                         <?php if ($produk->status_product == 'active') {  ?>
                             <button id="add_cart" class="btn yellow-button shadow" data-kdproduct="<?php echo $produk->kd_product ?>" data-nameproduct="<?php echo $produk->name_product ?>" data-photoproduct="<?php echo $produk->photo_product ?>">Masukan Ke Keranjang</button>
                             <?php if ($produk->subbutton_name != '') { ?>
                                 <h3 style="text-align: center;">atau</h3>
                                 <a href="<?= $produk->subbutton_link ?>" class="btn yellow-button shadow"><?= $produk->subbutton_name ?></a>
                             <?php } ?>
                         <?php } else { ?>
                             <button id="add_cart" class="btn yellow-button shadow" data-kdproduct="<?php echo $produk->kd_product ?>" data-nameproduct="<?php echo $produk->name_product ?>" data-photoproduct="<?php echo $produk->photo_product ?>" disabled>Masukan Ke Keranjang</button>
                             <?php if ($produk->subbutton_name != '') { ?>
                                 <h3 style="text-align: center;">atau</h3>
                                 <a href="<?= $produk->subbutton_link ?>" class="btn yellow-button shadow"><?= $produk->subbutton_name ?></a>
                         <?php }
                            } ?>
                     </div>
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
                                 <p class="fw-light small text-secondary">Terjual: <span class="fw-bold text-warning">10000</span></p>
                                 <h5 class="card-title fw-bold text-dark"><?= ucfirst($sejenis->name_brand) . ' ' . $sejenis->name_product ?></h5>
                                 <!-- <p class="card-text yellow-text mb-3">Rp. <?= $sejenis->price_product ?></p> -->
                                 <?php if ($min->min_price != $max->max_price) {
                                        if ($sejenis->discount != 0) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($max->max_price, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($sejenis->discount / 100)), '0', ',', '.') ?> ~ <span>Rp. <?= number_format($max->max_price - ($max->max_price * ($sejenis->discount / 100)), '0', ',', '.') ?></span></p>
                                     <?php } else {
                                        if ($sejenis->discount != 0) { ?>
                                         <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($min->min_price, '0', ',', '.') ?></s></p>
                                     <?php } ?>
                                     <p class="card-text yellow-text mb-3">Rp. <?= number_format($min->min_price - ($min->min_price * ($sejenis->discount / 100)), '0', ',', '.') ?></p>
                                 <?php } ?>
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



 <!-- pilih headbord modal -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <?php foreach ($unit as $unit) { ?>
                         <div class="col-4 bg-white rounded-3 border border-1">
                             <div class="custom-control custom-checkbox image-checkbox">
                                 <input type="checkbox" class="custom-control-input cek <?= $unit['kd_product'] ?>" name="unit[]" id="<?= $unit['kd_product'] ?>" onClick="toggle(this,'<?= $unit['kd_product'] ?> ')" data-kd_unit="<?= $unit['kd_unit'] ?>" data-photo_unit="<?= $unit['photo_unit'] ?>" data-name_unit="<?= $unit['name_unit'] ?>" />
                                 <label class="custom-control-label" for="ck1b">
                                     <img src="<?= base_url('assets/images/unitproduk/' . $unit['photo_unit']) ?>" alt="#" class="img-fluid" />
                                 </label>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </div>
             <div class="modal-footer">

                 <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Ubah</button>
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
         var price = $(this).data("pricevariation");
         var discount = $(this).data("discount");
         var panjangVariasi = $(this).data("lengthvariation");
         var lebarVariasi = $(this).data("widthvariation");
         var beratVariasi = $(this).data("weightvariation");


         value = convertToRupiah(price - (price * (discount / 100)));
         beforeValue = "<s>" + convertToRupiah(price) + "</s>";
         $('input[name=priceproduct]').val(price - (price * (discount / 100)));
         $('input[name=beforepriceproduct]').val(price);
         $('input[name=discount]').val((discount / 100));
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

 <script type="text/javascript">
     $(document).ready(function() {
         $('#total_items').load("<?php echo base_url(); ?>user/cart/load_items");
         $('#add_cart').click(function() {

             if ($("input[name='variation']:checked").val()) {
                 if ($('#pilihHeadboard').length) {
                     if ($("input[name='unit[]']:checked").val()) {
                         var kd_product = $(this).data("kdproduct");
                         var name_product = $(this).data("nameproduct");
                         var price = $('input[name=priceproduct]').val();
                         var quantity = 1;
                         var photo_product = $(this).data("photoproduct");
                         var variation = $('input[name="variation"]:checked').val();
                         var weight_product = $('input[name=weight_variation]').val();
                         var length_product = $('input[name=length_variation]').val();
                         var width_product = $('input[name=width_variation]').val();
                         var kd_unit = $('input[name=kd_unit]').val();
                         var photo_unit = $('input[name=photo_unit]').val();
                         var name_unit = $('input[name=name_unit]').val();


                         $.ajax({
                             url: "<?= base_url(); ?>user/cart/add_to_cart",
                             method: "POST",
                             data: {
                                 kd_product: kd_product,
                                 name_product: name_product,
                                 price_product: parseInt(price),
                                 quantity: quantity,
                                 photo_product: photo_product,
                                 variation: variation,
                                 length_product: length_product,
                                 width_product: width_product,
                                 weight_product: weight_product,
                                 kd_unit: kd_unit,
                                 name_unit: name_unit,
                                 <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
                             },
                             success: function(data) {
                                 $('#detail_cart').html(data);
                                 $('#total_items').load(
                                     "<?php echo base_url(); ?>user/cart/load_items");
                                 alert("Sukses");
                             },
                             error: function(error) {
                                 alert(JSON.stringify(error));
                             }


                         });
                     } else {
                         alert('Tolong Pilih Opsi');
                         return false;
                     }
                 } else {
                     var kd_product = $(this).data("kdproduct");
                     var name_product = $(this).data("nameproduct");
                     var price = $('input[name=priceproduct]').val();
                     var quantity = 1
                     var photo_product = $(this).data("photoproduct");
                     var variation = $('input[name="variation"]:checked').val();
                     var weight_product = $('input[name=weight_variation]').val();
                     var length_product = $('input[name=length_variation]').val();
                     var width_product = $('input[name=width_variation]').val();
                     var kd_unit = $('input[name=kd_unit]').val();
                     var photo_unit = $('input[name=photo_unit]').val();
                     var name_unit = $('input[name=name_unit]').val();


                     $.ajax({
                         url: "<?= base_url(); ?>user/cart/add_to_cart",
                         method: "POST",
                         data: {
                             kd_product: kd_product,
                             name_product: name_product,
                             price_product: parseInt(price),
                             quantity: quantity,
                             photo_product: photo_product,
                             variation: variation,
                             length_product: length_product,
                             width_product: width_product,
                             weight_product: weight_product,
                             kd_unit: kd_unit,
                             name_unit: name_unit,
                             <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
                         },
                         success: function(data) {
                             $('#detail_cart').html(data);
                             $('#total_items').load(
                                 "<?php echo base_url(); ?>user/cart/load_items");
                             alert("Suksess");
                         },
                         error: function(error) {
                             alert(JSON.stringify(error));
                         }


                     });
                 }
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
     $('input:checkbox[name="unit[]"]').change(function() {
         var kd_unit = $(this).data("kd_unit");
         var photo_unit = $(this).data("photo_unit");
         var name_unit = $(this).data("name_unit");

         $(`input[name= kd_unit`).val(kd_unit);
         $(`input[name=photo_unit`).val(photo_unit);
         $(`input[name=name_unit`).val(name_unit);
         document.getElementById('photoUnit').src = "<?= base_url('assets/images/unitproduk/') ?>" + photo_unit;
     });
 </script>

 <script>
     $(document).ready(function() {
         $('input:checkbox[name="unit[]"]:first').prop('checked', function() {
             this.checked = true;
             var kd_unit = $(this).data("kd_unit");
             var photo_unit = $(this).data("photo_unit");
             var name_unit = $(this).data("name_unit");

             $(`input[name= kd_unit`).val(kd_unit);
             $(`input[name=photo_unit`).val(photo_unit);
             $(`input[name=name_unit`).val(name_unit);
             document.getElementById('photoUnit').src = "<?= base_url('assets/images/unitproduk/') ?>" + photo_unit;
         });
     });
 </script>