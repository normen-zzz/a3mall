<!-- Katalog -->
<section id="catalog">
    <div class="container py-5">
        <div class="row">
            <div class="col text-end">
                <a target="_blank" href="<?= base_url('assets/user/img/katalog/pdf/' . $catalogue['pdf_catalogue']) ?>" class="btn yellow-button px-5 py-2">
                    Unduh sebagai PDF
                </a>
            </div>
        </div>
        <?php foreach ($detailcatalogue as $detail) { ?>
            <div class="row justify-content-center pt-5">
                <div class="col-lg-10">
                    <img src="<?= base_url('assets/user/img/katalog/' . $detail['photo_detail_catalogue']) ?>" class="card-img" alt="..." />
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Akhir Katalog -->