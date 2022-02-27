 <!-- Katalog -->
 <section id="catalog">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <h3>Brosur ATIGAMALL</h3>
                 <p class="fw-light text-secondary">
                     Katalog ATIGAMALL ini dirancang khusus untuk memberi Anda informasi tentang produk yang kita jual pada setiap tahun nya Anda dapat melihat katalog ATIGAMALL secara online menggunakan tautan di bawah ini.
                 </p>
             </div>
         </div>
         <hr />
         <?php foreach ($catalogue as $catalogue) { ?>
             <div class="row justify-content-center pt-3">
                 <div class="col-lg-10">
                     <a href="<?= base_url('Catalogue/detailCatalogue/' . $catalogue['slug_catalogue']) ?>" class="text-dark text-decoration-none">
                         <h3 class="m-0 fw-bold"><?= $catalogue['name_catalogue'] ?></h3>
                         <img src="<?= base_url('assets/user/img/katalog/' . $catalogue['photo_catalogue']) ?>" class="card-img" alt="..." />
                     </a>
                 </div>
             </div>
         <?php } ?>
     </div>
 </section>
 <!-- Akhir Katalog -->