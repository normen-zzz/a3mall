<!-- Alamat -->
<section class="bg-white p-5 mt-5" id="alamat">
    <div class="container">
        <div class="row">
            <div class="col">
                <p><?= $detail_transaksi['name_customers'] ?></p>
                <p><?= $detail_transaksi['telp_customers'] ?></p>
                <p><?= $detail_transaksi['address_customers'] ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Alamat -->
<!-- Keranjang -->
<section id="keranjang" class="bg-white py-5 my-5">
    <div class="container">
        <?php $ongkir = 0;
        foreach ($transaksi as $transaksi) { ?>
            <div class="row mb-5 keranjang-grid">
                <div class="col-md-2">
                    <div class="img text-center">
                        <img src="<?= base_url('assets/images/produk/' . $transaksi->photo_product) ?>" alt="" />
                    </div>
                </div>
                <div class="col-md my-auto">
                    <div class="row">
                        <div class="col-md-3 py-1">
                            <p><?= $transaksi->name_product ?></p>
                        </div>
                        <div class="col-md-2 py-1 text-center isi-keranjang my-auto">
                            <p class="fw-light text-secondary my-auto">Variasi: <?= $transaksi->name_variation ?></p>
                        </div>
                        <div class="col-md-3 py-1 text-center isi-keranjang my-auto">
                            <p class="my-auto">Rp. <?= number_format($transaksi->price, '0', ',', '.') ?></p>
                        </div>
                        <div class="col-md-1 py-1 text-center isi-keranjang my-auto">
                            <p class="my-auto">x<?= $transaksi->quantity ?></p>
                        </div>
                        <div class="col-md-3 py-1 text-center isi-keranjang my-auto">
                            <p class="yellow-text my-auto">Rp. <?= $transaksi->total_price ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php $ongkir += $transaksi->ongkir;
        } ?>
    </div>
</section>
<!-- Akhir Keranjang -->

<!-- metPembayaran -->
<section class="bg-white" id="metPembayaran">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-lg">
                <h5 class="fw-bold">Ongkir :</h5>
            </div>
            <div class="col-lg-4">
                <p><?= $ongkir ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <h5 class="fw-bold">Kode Transaksi :</h5>
            </div>
            <div class="col-lg-4">
                <p><?= $detail_transaksi['kd_transaction'] ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir metPembayaran -->

<!-- Check -->
<section class="bg-white mb-5 py-5" id="check">
    <div class="container">
        <div class="row">
            <div class="col my-auto">
                <h5 class="fw-bold">Produk (<?= $detail_transaksi['total_quantity'] ?>)</h5>
            </div>
            <div class="col my-auto justify-content-end d-flex">
                <p class="my-auto me-5">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= number_format($detail_transaksi['total_transaction'], '0', ',', '.') ?></span></p>
                <form id="payment-form" method="post" action="<?= base_url() ?>user/Checkout/finish">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                    <input type="number" id="jumlah" value="<?= $detail_transaksi['total_transaction'] ?>" hidden>
                    <input type="text" id="nama" value="<?= $detail_transaksi['name_customers'] ?>" hidden>
                    <input type="text" name="kd_transaction" id="kd_transaction" value="<?= $detail_transaksi['kd_transaction'] ?>" hidden>

                    <button type="button" data-id="<?php echo $detail_transaksi['id_detail_transaction']; ?>" class=" btn yellow-button px-5 py-2" id="pay-button">Bayar</button>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Check -->