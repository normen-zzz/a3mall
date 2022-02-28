<?php function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '....';
    }
    return $text;
} ?>
<!-- Hero -->
<section class="overflow-hidden" id="hero">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php $no = 1;
                        foreach ($carousel as $carousel) { ?>
                            <div class="carousel-item <?php if ($no == 1) {
                                                            echo 'active';
                                                        } ?>">
                                <img src="<?= base_url('assets/user/img/carousel/' . $carousel['photo_carousel']) ?>" alt="..." />
                            </div>
                        <?php $no++;
                        } ?>
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
            </div>
        </div>
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
                        <h5 class="fw-bold yellow-text">Berkualitas Tinggi</h5>
                        <p class="fw-light small">
                            Produk kami menggunakan bahan yang dibuat khusus dengan kualitas terbaik dikelasnya sesuai dengan keseimbangan antara nilai dan produknya. </p>
                    </div>
                    <div class="col-lg">
                        <h5 class="fw-bold yellow-text">Inovatif dan Unik</h5>
                        <p class="fw-light small">
                            Produk yang kami desain dengan penampilan terkini dan elegan membawa inspirasi sejuk dan nyaman </p>
                    </div>
                    <div class="col-lg">
                        <h5 class="fw-bold yellow-text">Biaya Terjangkau</h5>
                        <p class="fw-light small">
                            Kami memberikan harga yang cukup terjangkau </p>
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
                <h2>Baru Datang</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="judul pb-3">
                    <h3><a href="<?= base_url('Product') ?>" style="text-decoration: none;" class="text-dark">Sofa</a></h3>
                </div>
            </div>
        </div>
        <div class="row arival-grid">
            <?php foreach ($sofa as $sofa) {
                $max = $this->barang->getMaxPriceFromVariation($sofa->kd_product)->row();
                $min = $this->barang->getMinPriceFromVariation($sofa->kd_product)->row(); ?>
                <div class="col-lg-3 py-2">
                    <a href="<?= base_url('Deskripsi/' . $sofa->slug_product) ?>" style="text-decoration: none">
                        <div class="bg-white card-arival">
                            <img src="<?= base_url('assets/images/produk/' . $sofa->photo_product) ?>" class="card-img-top p-3" alt="..." />
                            <div class="card-body">
                                <p class="fw-light text-secondary small">Sofa</p>
                                <h5 class="card-title fw-bold text-dark"><?= $sofa->name_product ?></h5>
                                <?php if ($min->min_price != $max->max_price) { ?>
                                    <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($sofa->beforeprice_product + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($sofa->beforeprice_product + $max->max_price, '0', ',', '.') ?></s></p>
                                    <p class="card-text yellow-text mb-3">Rp. <?= number_format($sofa->price_product + $min->min_price, '0', ',', '.') ?> ~ <span>Rp. <?= number_format($sofa->price_product + $max->max_price, '0', ',', '.') ?></span></p>
                                    <?php } else {
                                    if ($sofa->beforeprice_product != $sofa->price_product) { ?>
                                        <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($sofa->beforeprice_product, '0', ',', '.') ?></s></p>
                                    <?php } ?>
                                    <p class="card-text yellow-text mb-3">Rp. <?= number_format($sofa->price_product, '0', ',', '.') ?></p>
                                <?php } ?>
                                <!-- <p class="card-text yellow-text mb-3">Rp. <?= number_format($sofa->price_product, '0', ',', '.') ?></p> -->
                                <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                <div class="text-center btn-foto">
                                    <a href="<?= base_url('Deskripsi/' . $sofa->slug_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button btn-foto">Detail</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row pt-5">
            <div class="judul pb-3">
                <h3><a style="text-decoration: none" href="<?= base_url('Product') ?>" class="text-dark">Spring Bed</a></h3>
            </div>
        </div>
        <div class="row arival-grid">
            <?php foreach ($springbed as $springbed) {
                $max = $this->barang->getMaxPriceFromVariation($springbed->kd_product)->row();
                $min = $this->barang->getMinPriceFromVariation($springbed->kd_product)->row(); ?>
                <div class="col-lg-3 py-2">
                    <a href="<?= base_url('Deskripsi/' . $springbed->slug_product) ?>" style="text-decoration: none">
                        <div class="bg-white card-arival">
                            <img src="<?= base_url('assets/images/produk/' . $springbed->photo_product) ?>" class="card-img-top p-3" alt="..." />
                            <div class="card-body">
                                <p class="fw-light text-secondary small">Spring Bed</p>
                                <h5 class="card-title fw-bold text-dark"><?= $springbed->name_product ?></h5>
                                <?php if ($min->min_price != $max->max_price) { ?>
                                    <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($springbed->beforeprice_product + $min->min_price, '0', ',', '.') ?></s> ~ <s>Rp. <?= number_format($springbed->beforeprice_product + $max->max_price, '0', ',', '.') ?></s></p>
                                    <p class="card-text yellow-text mb-3">Rp. <?= number_format($springbed->price_product + $min->min_price, '0', ',', '.') ?> ~ <span>Rp. <?= number_format($springbed->price_product + $max->max_price, '0', ',', '.') ?></span></p>
                                    <?php } else {
                                    if ($springbed->beforeprice_product != $springbed->price_product) { ?>
                                        <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($springbed->beforeprice_product, '0', ',', '.') ?></s></p>
                                    <?php } ?>
                                    <p class="card-text yellow-text mb-3">Rp. <?= number_format($springbed->price_product, '0', ',', '.') ?></p>
                                <?php } ?>
                                <!-- <p class="card-text yellow-text mb-3">Rp. <?= number_format($springbed->price_product, '0', ',', '.') ?></p> -->
                                <!-- <p class="card-text yellow-text mb-3">Coming Soon</p> -->
                                <div class="text-center btn-foto">
                                    <a href="<?= base_url('Deskripsi/' . $springbed->slug_product) ?>" class="btn rounded-pill px-5 py-2 yellow-button btn-foto">Detail</a>
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
                <a href="#footer" class="btn btn-light px-5 py-2 yellow-text shadow">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Contact -->

<!-- Blog -->
<section class="py-5" id="blog">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h1>Blog</h1>
            </div>
        </div>
        <div class="row pembungkus-blog pt-3">
            <?php $no = 0;
            foreach ($blog as $blog) { ?>
                <div class="col-lg-4 py-2">
                    <div class="bg-white bg-card">
                        <img src="<?= base_url('assets/user/img/blog/' . $blog['photo_blog']) ?>" class="card-img-top" alt="..." />
                        <div class="card-body mx-3">
                            <h5 class="card-title"><?= $blog['title_blog'] ?></h5>
                            <p class="card-text"><?= limit_text($blog['content_blog'], 19) ?></p>
                            <a href="<?= base_url('Blog/detail/' . $blog['slug_blog']) ?>" class="btn btn-blog">See more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php $no++;
            } ?>
        </div>
        <?php if ($no > 3) { ?>
            <div class="row pt-4">
                <div class="col text-center">
                    <a href="<?= base_url('Blog') ?>" class="btn yellow-button px-5 py-2">Selengkapnya</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Blog End -->

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