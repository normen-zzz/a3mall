<!-- Status Pesanan -->
<section class="bg-white my-5 shadow" id="status">
    <div class="container py-5">
        <div class="row border-bottom">
            <div class="col">
                <h5 class="text-end">Status Pesanan</h5>
            </div>
        </div>
        <?php foreach ($transaksi as $transaksi) { ?>
            <div class="row my-5 keranjang-grid">
                <div class="col-md-2">
                    <div class="img text-center">
                        <img src="<?= base_url('assets/images/produk/' . $transaksi->photo_product) ?>" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md py-1">
                            <p><?= $transaksi->name_product ?></p>
                            <p class="fw-light text-secondary">Variasi: <?= $transaksi->name_variation ?></p>
                            <p>x1</p>
                        </div>
                        <div class="col-md py-1 text-end my-auto">
                            <p class="card-text mb-0 small fw-light text-secondary"><s>Rp. <?= number_format($transaksi->beforeprice_product, '0', ',', '.') ?></s></p>
                            <p class="my-auto">Rp. <?= number_format($transaksi->price_product, '0', ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row mb-3">
            <div class="col my-auto">
                <h5 class="fw-bold">Produk (<?= $detail_transaksi['total_quantity'] ?>)</h5>
            </div>
            <div class="col my-auto justify-content-end d-flex">
                <p class="my-auto">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= number_format($detail_transaksi['total_transaction'], '0', ',', '.') ?></span></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Status Pesanan -->