<!-- Hero -->
<section class="overflow-hidden" id="hero">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/user/') ?>img/landingpage/1.jpg" class="d-block w-100" alt="..." />
                <div class="card-img-overlay container justify-content-center">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="card-title yellow-text fw-light">Spring Bed & Sofa Bed</h5>
                            <p class="card-text display-3 text-white">NEW ARRIVAL 2022</p>
                            <a href="<?= base_url('Product') ?>" class="btn yellow-button rounded-pill px-5 py-2">Pesan</a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/user/') ?>img/landingpage/2.jpg" class="d-block w-100" alt="..." />
                <div class="card-img-overlay container justify-content-center">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="card-title yellow-text fw-light">Promo 20%</h5>
                            <p class="card-text display-3 text-white">Tahun Baru Imlek</p>
                            <a href="<?= base_url('Product') ?>" class="btn yellow-button rounded-pill px-5 py-2">Pesan</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Akhir Hero -->

<!-- Tersedia -->
<section class="py-5" id="tersedia">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h5>Tersedia juga di</h5>
                <a href="https://shopee.co.id/shop/654899565/" target="_blank">
                    <img src="<?= base_url('assets/user/') ?>img/landingpage/shopee-logo-40477 1.svg" class="img-fluid mx-5" alt="" />
                </a>
                <a href="https://tokopedia.link/a3mall" target="_blank">
                    <img src="<?= base_url('assets/user/') ?>img/landingpage/tokopedia-38840 1.svg" class="img-fluid mx-5" alt="" />
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Tersedia -->

<!-- Why -->
<section class="py-5 bg-white" id="why">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-auto">
                <h1 class="display-4 fw-bold">Kenapa memilih kita?</h1>
            </div>
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <h5 class="fw-bold yellow-text">Gratis Ongkir</h5>
                        <p class="fw-light small">
                            Kami Menyediakan gratis ongkir khususnya daerah jabodetabek </p>
                    </div>
                    <div class="col-lg">
                        <h5 class="fw-bold yellow-text">Banyak Pilihan</h5>
                        <p class="fw-light small">
                            Produk yang kami sediakan mulai dari Spring Bed hingga Sofa dengan berbagai macam tipe dan
                            juga warna yang bervarian </p>
                    </div>
                    <div class="col-lg">
                        <h5 class="fw-bold yellow-text">Mudah Dipasang</h5>
                        <p class="fw-light small">
                            Kami memikirkan bahwa produk yang kami berikan kepada pembeli agar mudah dipasang </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Why -->

<!-- New Arival -->
<section class="py-5" id="arival">
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h2>New Arrival</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="judul pb-3">
                    <h3>Sofa</h3>
                </div>
            </div>
        </div>
        <div class="row arival-grid">
            <?php foreach ($sofa as $sofa) { ?>
                <div class="col-lg-3 py-2">
                    <a href="<?= base_url('Deskripsi/' . $sofa->kd_product) ?>" style="text-decoration: none">
                        <div class="bg-white card-arival">
                            <img src="<?= base_url('assets/user/') ?>img/produk/MH-103.png" class="card-img-top p-3" alt="..." />
                            <div class="card-body">
                                <p class="fw-light text-secondary small">Sofa</p>
                                <h5 class="card-title fw-bold text-dark"><?= $sofa->name_product ?></h5>
                                <p class="card-text yellow-text mb-3">Rp. <?= $sofa->price_product ?></p>
                                <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                <div class="text-center btn-foto">
                                    <a href="<?= base_url('Deskripsi/' . $sofa->kd_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button btn-foto">Detail</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row pt-5">
            <div class="judul pb-3">
                <h3>Spring Bed</h3>
            </div>
        </div>
        <div class="row arival-grid">
            <?php foreach ($springbed as $springbed) { ?>
                <div class="col-lg-3 py-2">
                    <a href="<?= base_url('Deskripsi/' . $springbed->kd_product) ?>" style="text-decoration: none">
                        <div class="bg-white card-arival">
                            <img src="<?= base_url('assets/images/produk/' . $springbed->photo_product) ?>" class="card-img-top p-3" alt="..." />
                            <div class="card-body">
                                <p class="fw-light text-secondary small">Spring Bed</p>
                                <h5 class="card-title fw-bold text-dark"><?= $springbed->name_product ?></h5>
                                <p class="card-text yellow-text mb-3">Rp. <?= $springbed->price_product ?></p>
                                <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                <div class="text-center btn-foto">
                                    <a href="<?= base_url('Deskripsi/' . $springbed->kd_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button btn-foto">Detail</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Akhir New Arival -->

<!-- Contact -->
<section class="overflow-hidden" id="kontak">
    <div class="container-fluid p-0">
        <div class="row kontak-isi">
            <div class="col-lg">
                <img src="<?= base_url('assets/user/') ?>img/landingpage/Image.jpg" class="img-fluid" alt="" />
            </div>
            <div class="col-lg my-auto p-5">
                <h1 class="display-4 fw-bold text-white pb-3">Ada pertanyaan terkait produk?</h1>
                <a href="tel:+6281388912929" class="btn btn-light px-5 py-2 yellow-text shadow">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Contact -->

<!-- Testimoni -->
<!-- <section class="py-5" id="testimoni">
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h5 class="yellow-text fw-light">TESTIMONI</h5>
                <h2>Apa kata mereka?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col card border-0 bg-transparent">
                <img src="<?= base_url('assets/user/') ?>img/landingpage/bg-testi.png" alt="" />
                <div class="card-img-overlay">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card shadow p-3" style="border-radius: 20px">
                                    <img class="rounded-circle shadow bg-danger mx-auto" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" style="width: 50px; height: 50px" alt="" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bang Upin</h5>
                                        <p class="card-text fw-light text-secondary small">Pedagan Asongan</p>
                                        <p>
                                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eveniet tempore pariatur voluptate eligendi. Beatae, possimus voluptatibus officia amet perferendis adipisci! Adipisci, neque quos officia sed ad
                                            magnam eos ipsa."
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow p-3" style="border-radius: 20px">
                                    <img class="rounded-circle shadow bg-danger mx-auto" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" style="width: 50px; height: 50px" alt="" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bang Upin</h5>
                                        <p class="card-text fw-light text-secondary small">Pedagan Asongan</p>
                                        <p>
                                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eveniet tempore pariatur voluptate eligendi. Beatae, possimus voluptatibus officia amet perferendis adipisci! Adipisci, neque quos officia sed ad
                                            magnam eos ipsa."
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow p-3" style="border-radius: 20px">
                                    <img class="rounded-circle shadow bg-danger mx-auto" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" style="width: 50px; height: 50px" alt="" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bang Upin</h5>
                                        <p class="card-text fw-light text-secondary small">Pedagan Asongan</p>
                                        <p>
                                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eveniet tempore pariatur voluptate eligendi. Beatae, possimus voluptatibus officia amet perferendis adipisci! Adipisci, neque quos officia sed ad
                                            magnam eos ipsa."
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow p-3" style="border-radius: 20px">
                                    <img class="rounded-circle shadow bg-danger mx-auto" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" style="width: 50px; height: 50px" alt="" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Bang Upin</h5>
                                        <p class="card-text fw-light text-secondary small">Pedagan Asongan</p>
                                        <p>
                                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eveniet tempore pariatur voluptate eligendi. Beatae, possimus voluptatibus officia amet perferendis adipisci! Adipisci, neque quos officia sed ad
                                            magnam eos ipsa."
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Akhir Testimoni -->